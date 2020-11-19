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
        $lastId = "";
        if (\request()->ajax()){

            if(\request()->last_id >= 0){

                $followers = DB::table('friends')
                    ->where('id','>',\request()->last_id)
                    ->where('following_user_id','=',$user_id)
                    ->limit(2)
                    ->get();
            }else{

//                $followers = DB::table('friends')
//                    ->where('follower_user_id','=',$user_id)
//                    ->orderBy('id','DESC')
//                    ->limit(1)
//                    ->get();
            }
            $output='';
            if(! $followers->isEmpty()){

                foreach ($followers as $follower) {
                    $output .= view('layouts.popup.followers',compact('follower'))->render() ;
                    $lastId = $follower->id;
                }

                $output .= view('layouts.showmore-btns.show_more_followers',compact('lastId','user_id'))->render();

            }else{
                $output .= view('layouts.showmore-btns.no_more_followers')->render();

            }
            echo $output;

        }else{

        }
    }

    public function followings($user_id)
    {
        $lastId = "";
        if (\request()->ajax()){

            if(\request()->last_id >= 0){

                $followings = DB::table('friends')
                    ->where('id','>',\request()->last_id)
                    ->where('follower_user_id','=',$user_id)
                    ->limit(2)
                    ->get();

            }else{

//                $followings = DB::table('friends')
//                    ->where('following_user_id','=',$user_id)
//                    ->orderBy('id','DESC')
//                    ->limit(1)
//                    ->get();
            }

            $output='';
            if(! $followings->isEmpty()){
                foreach ($followings as $following) {
                    $output .= view('layouts.popup.followings',compact('following'))->render();

                    $lastId = $following->id;
                }

                $output .= view('layouts.showmore-btns.show_more_followings',compact('lastId','user_id'))->render();

            }else{
                $output .= view('layouts.showmore-btns.no_more_followings')->render();

            }
            echo $output;
        }else{


        }
    }
}
