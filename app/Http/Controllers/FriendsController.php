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
        $lastId = "";
        if (\request()->ajax()){

            if(\request()->last_id > 0){

                $followers = DB::table('friends')
                    ->where('id','>',\request()->last_id)
                    ->where('following_user_id','=',$user_id)
                    ->limit(10)
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

                    $output .= '
                    <div class="table-loves-record">
                            <span class="flex-container-column-wrap">
                                <a href="/users/'.$follower->follower_user_id.'">
                                    <img src="/storage/uploads/profile_pictures/'.User::findorfail($follower->follower_user_id)->profile_picture.'" alt="User photo" class="track-comment-photo">
                                </a>
                                <a href="/users/'.$follower->follower_user_id.'" class="flex-item-row-wrap table-loves-record-user_name">
                                    '.User::findorfail($follower->follower_user_id)->full_name().'
                                </a>
                            </span>
                        </div>
                    ';

                    $lastId = $follower->id;
                }

                $output.='
                    <div class="master_view-show_more" id="master_view-show_more-followers">
                        <button type="button" id="master_view-show_more-button-follower" class="master_view-show_more-input" data-last_id="'.$lastId.'" data-user_id="'.$user_id.'">
                            Show More ..
                        </button>
                    </div>
                    ';
            }else{

                $output.= '
                    <div class="master_view-show_more">
                        <button type="button" class="master_view-show_more-input-no_more">
                            No More
                        </button>
                    </div>
                    ';
            }
            echo $output;

        }else{
            $tracks_or_track_or_not = 'not' ;

            $followers = User::findorfail(\request('user_id'))->Followers()->simplePaginate(1) ;

            foreach ($followers as $follower){
                $lastId = $follower->id ;
            }

            return view('followers',compact('followers','tracks_or_track_or_not','user_id' ,'lastId'));

        }
    }

    public function followings($user_id)
    {
        $lastId = "";
        if (\request()->ajax()){

            if(\request()->last_id > 0){

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
                    $output .= '
                        <div class="table-loves-record">
                            <span class="flex-container-column-wrap">
                                <a href="/users/'.$following->following_user_id.'">
                                    <img src="/storage/uploads/profile_pictures/'.User::findorfail($following->following_user_id)->profile_picture.'" alt="User photo" class="track-comment-photo">
                                </a>
                                <a href="/users/{{$following->following_user_id}}" class="flex-item-row-wrap table-loves-record-user_name">
                                    '.User::findorfail($following->following_user_id)->full_name().'
                                </a>
                            </span>
                        </div>
                    ';

                    $lastId = $following->id;
                }

                $output.='
                    <div class="master_view-show_more" id="master_view-show_more-followings">
                        <button type="button" id="master_view-show_more-button-followings" class="master_view-show_more-input" data-last_id="'.$lastId.'" data-user_id="'.$user_id.'">
                            Show More
                        </button>
                    </div>
                    ';
            }else{

                $output.= '
                    <div class="master_view-show_more">
                        <button type="button" class="master_view-show_more-input-no_more">
                            No More
                        </button>
                    </div>
                    ';
            }
            echo $output;
        }else{
            $tracks_or_track_or_not = 'not' ;

            $followings = User::findorfail(\request('user_id'))->followings()->simplePaginate(1) ;

            foreach ($followings as $following){
                $lastId = $following->id ;
            }

            return view('followings',compact('followings','tracks_or_track_or_not','user_id','lastId'));

        }
    }
}
