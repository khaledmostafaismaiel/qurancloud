<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Track;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $valid = $request->validate(
            [
                'track_id'=> ['required'] ,
                'comment'=> ['required'] ,
            ]
        );

        if(Comment::create([
            'user_id'=> auth()->id(),
            'track_id'=>  strtolower(trim($request->track_id)) ,
            'comment'=>  trim($request->comment) ,
        ])){

            session()->flash('message','Done');
            return back();

        }else{
            session()->flash('message','Sorry');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //strftime("%Y-%m-%d %H:%M:%S , time())
        //return comment
        //$comments = Track::findorfail($id);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comments
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {


        if($comment->user_id == auth()->id()){
            $comment_to_edit = $comment;
            $track = Track::findorfail($comment->track_id);
            $comments = $track->Comments()->simplepaginate(50) ;
            $tracks_or_track_or_not = 'track';
            $track_id_to_edit = null;

            return view('show_track')->with([
                'comment_to_edit'=>$comment_to_edit ,
                'track'=>$track ,
                'comments'=>$comments,
                'tracks_or_track_or_not'=>$tracks_or_track_or_not,
                'track_id_to_edit'=>$track_id_to_edit
            ]);
        }
        else{
          return  back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {

        $comment->comment = strtolower(trim($request->comment)) ;

        if($comment->update()){
            session()->flash('message','Done');

            return back()->with([
                'comment_to_edit'=>null ,
            ]);

        }else{
            session()->flash('message','Sorry');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        if($comment->delete()){
            session()->flash('message','Done');
            return back();

        }else{
            session()->flash('message','Sorry');
            return back();

        }
    }
}
