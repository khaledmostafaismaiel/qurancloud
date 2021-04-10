<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Track;
use App\Http\Requests\StoreTrackCommentRequest;
use App\Http\Requests\UpdateTrackCommentRequest;
use App\Events\NewCommentNotification;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (\Request()->ajax()){
            if(\Request()->pageNumber >= 1){
                $comments = Track::findOrfail(request('track_id'))->Comments()->simplePaginate(2);
            }
            $output='';
            if(! $comments->isEmpty()){
                foreach ($comments as $comment) {
                    $output .= view('layouts.track-comment.track_comment',compact('comment'))->render();
                }
            }

            echo $output;
//          return response()->json(['html'=>$output]);
        }
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
    public function store(StoreTrackCommentRequest $request)
    {
        if ($request->ajax()) {

            $comment = new Comment();
            $comment->user_id = auth()->id();
            $comment->track_id = $request->track_id;
            $comment->comment = $request->comment;
            if ($comment->save()) {
                event(new NewCommentNotification($request->track_id));
//                event(new NewCommentNotification($comment));
                return response()->json([
                    'comment' => view('layouts.track-comment.track_comment', compact('comment'))->render(),
                    'priorty' => "success",
                    'title' => 'Success',
                    'message' => "Comment Added successfully"
                ]);
            } else {
                return response()->json([
                    'priorty' => "danger",
                    'title' => 'Error',
                    'message' => "Sorry,Try again"
                ]);
            }
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

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comments
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTrackCommentRequest $request, Comment $comment)
    {
        if($request->ajax()){
            $comment->comment = $request->comment;
            if ($comment->update()) {
                return response()->json([
                    'priorty' => "success",
                    'title' => 'Success',
                    'message' => "Comment edited successfully"
                ]);
            } else {
                return response()->json([
                    'priorty' => "danger",
                    'title' => 'Error',
                    'message' => "Sorry,Try again"
                ]);
            }
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
        if(\request()->ajax()) {
            if($comment->delete()){
                return response()->json([
                    'priorty'=>"success",
                    'title'=>'Success',
                    'message'=>"Deleted successfully"
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
}
