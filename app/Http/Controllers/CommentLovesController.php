<?php

namespace App\Http\Controllers;

use App\Comment;
use App\commentLoves;
use Illuminate\Http\Request;

class CommentLovesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = \request('comment_id');
        $loves = Comment::findorfail($id)->commentLoves ;
        return view('loves' ,compact('loves'));
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
    public function store(Request $request)
    {
        $valid = request()->validate(
            [
                'comment_id'=> ['required'] ,

            ]
        );

        if(commentLoves::create([
            'user_id'=> auth()->id(),
            'comment_id'=> strtolower(trim(request('comment_id'))) ,
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
        if($commentLove->delete()){
            session()->flash('message','Done');
            return back();

        }else{
            session()->flash('message','Sorry');
            return back();

        }
    }
}
