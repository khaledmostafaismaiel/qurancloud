<?php

namespace App\Http\Controllers;

use App\Friends;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class FriendsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
     * @param  \App\Friends  $friends
     * @return \Illuminate\Http\Response
     */
    public function destroy(Friends $friends)
    {
        //
    }

    public function followers($user_id)
    {
        $tracks_or_track_or_not = 'not' ;

        $followers = User::findorfail(\request('user_id'))->Followers()->simplePaginate(10) ;
        return view('followers',compact('followers','tracks_or_track_or_not'));
    }

    public function followings($user_id)
    {
        $tracks_or_track_or_not = 'not' ;

        $followings = User::findorfail(\request('user_id'))->followings()->simplePaginate(10) ;
        return view('followings',compact('followings','tracks_or_track_or_not'));
    }
}
