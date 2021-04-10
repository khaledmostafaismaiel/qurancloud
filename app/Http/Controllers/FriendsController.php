<?php

namespace App\Http\Controllers;

use App\Friends;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreFriendRequest;
use Pusher\Pusher;

class FriendsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('friends');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFriendRequest $request)
    {
        if($request->ajax()){

            $id = Friends::insertGetId([
                'follower_user_id'=> auth()->id() ,
                'following_user_id'=> $request->following_user_id]);
            if($id){
                $options = array(
                    'cluster'=>env('PUSHER_APP_CLUSTER'),
                    'useTLS'=>true
                );
                $pusher = new Pusher(
                    env('PUSHER_APP_KEY'),
                    env('PUSHER_APP_SECRET'),
                    env('PUSHER_APP_ID'),
                    $options
                );
                $data = [
                    'following_user_id'=> $request->following_user_id,
                    'friend_request_notification'=>""
                ];

                $pusher->trigger('friend-request', 'new-friend-request', $data);

                return response()->json([
                    'friends_id'=>$id,
                    'priorty' => "success",
                    'title' => 'Success',
                    'message' => "Follow successfully"
                ]);
            }else{
                return response()->json([
                    'priorty'=>"danger",
                    'title'=>'Error',
                    'message'=>"Sorry,Try again"
                ]);
            }



        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Friends  $friends
     * @return \Illuminate\Http\Response
     */
    public function show(Friends $friends)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Friends  $friends
     * @return \Illuminate\Http\Response
     */
    public function edit(Friends $friends)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Friends  $friends
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Friends $friends)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Friends  $friend
     * @return \Illuminate\Http\Response
     */
    public function destroy(Friends $friend)
    {
        if(\request()->ajax()){
            if($friend->delete()){
                return response()->json([
                    'priorty'=>"success",
                    'title'=>'Success',
                    'message'=>"Unfollow successfully"
                ]);
            }else{
                return response()->json([
                    'priorty'=>"danger",
                    'title'=>'Error',
                    'message'=>"Sorry,Try again"
                ]);
            }
        }
    }

    public function followers($user_id)
    {
        if (\request()->ajax()){

            if(\request()->pageNumber >= 1){
                $followers = User::findOrfail($user_id)->followers()->simplepaginate(10);
            }

            $output='';
            if(! $followers->isEmpty()){

                foreach ($followers as $follower) {
                    $output .= view('layouts.popup.followers',compact('follower'))->render() ;
                }
            }
            echo $output;
        }
    }

    public function followings($user_id)
    {
        if (\request()->ajax()){
            if(\request()->pageNumber >= 1){
                $followings = User::findOrfail($user_id)->followings()->simplepaginate(10);
            }

            $output='';
            if(! $followings->isEmpty()){
                foreach ($followings as $following) {
                    $output .= view('layouts.popup.followings',compact('following'))->render();
                }
            }
            echo $output;
        }
    }
}
