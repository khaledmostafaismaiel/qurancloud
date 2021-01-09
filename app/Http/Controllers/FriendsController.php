<?php

namespace App\Http\Controllers;

use App\Friends;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;


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
    public function store(Request $request)
    {
        $valid = request()->validate(
            [
                'following_user_id'=> ['required'] ,
            ]
        );

        if(Friends::create([
            'follower_user_id'=> auth()->id() ,
            'following_user_id'=> strtolower(trim(request('following_user_id'))),
        ])){
            session()->flash('message','Done');
            return back();
        }else{
            session()->flash('message');
            return back();
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
        if ($friend->delete()){
            session()->flash('message','Done');
            return back();
        }else{
            session()->flash('message','Sorry');
            return back();
        }
    }

    public function followers($user_id)
    {
        if (\request()->ajax()){

            if(\request()->pageNumber >= 1){
                $followers = User::findOrfail($user_id)->followers()->paginate(10);
            }else{

            }
            $output='';
            if(! $followers->isEmpty()){

                foreach ($followers as $follower) {
                    $output .= view('layouts.popup.followers',compact('follower'))->render() ;
                }

            }else{

            }
            echo $output;

        }else{

        }
    }

    public function followings($user_id)
    {
        if (\request()->ajax()){
            if(\request()->pageNumber >= 1){
                $followings = User::findOrfail($user_id)->followings()->paginate(10);
            }else{

            }

            $output='';
            if(! $followings->isEmpty()){
                foreach ($followings as $following) {
                    $output .= view('layouts.popup.followings',compact('following'))->render();
                }
            }else{

            }
            echo $output;
        }else{

        }
    }
}
