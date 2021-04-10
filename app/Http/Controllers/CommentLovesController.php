<?php

namespace App\Http\Controllers;

use App\Comment;
use App\commentLoves;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTrackCommentLoveRequest;

class CommentLovesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (\request()->ajax()){
            if (\request()->pageNumber >= 1) {
                $loves = Comment::findorfail(\request('comment_id'))->commentLoves()->simplepaginate(40);

                $output = '';
                if (!$loves->isEmpty()) {
                    foreach ($loves as $love) {
                        $output .= view('layouts.popup.lover', compact('love'))->render();
                    }
                }
                echo $output;
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTrackCommentLoveRequest $request)
    {
        if($request->ajax()){
            $id = commentLoves::insertGetId([
                'user_id'=> auth()->id(),
                'comment_id'=> $request->track_comment_id ,
            ]);

            if ($id) {
                return response()->json([
                    'track_comment_love_id'=>$id,
                    'priorty' => "success",
                    'title' => 'Success',
                    'message'=>"Love successfully added"
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
     * @param  \App\commentLoves  $commentLoves
     * @return \Illuminate\Http\Response
     */
    public function show(commentLoves $commentLoves)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\commentLoves  $commentLoves
     * @return \Illuminate\Http\Response
     */
    public function edit(commentLoves $commentLoves)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\commentLoves  $commentLoves
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, commentLoves $commentLoves)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\commentLoves  $commentLove
     * @return \Illuminate\Http\Response
     */
    public function destroy(commentLoves $commentLove)
    {
        if (\request()->ajax()) {
            if ($commentLove->delete()) {
                return response()->json([
                    'priorty' => "success",
                    'title' => 'Success',
                    'message' => "Deleted successfully"
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
}
