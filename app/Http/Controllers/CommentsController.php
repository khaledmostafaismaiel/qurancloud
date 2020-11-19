<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Track;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lastId = null;
        if (\Request()->ajax()){
            $comments = Comment::
                orderByDesc('created_at')
                ->where('track_id','=',\request('track_id'))
                ->where('id','<',\request('last_id'))
                ->limit(2)
                ->get();
            $output='';
            if(! $comments->isEmpty()){
                foreach ($comments as $comment) {
                    $output .= view('layouts.track_comment',compact('comment'))->render();

                    $lastId = $comment->id;
                }
                $track_id = \request('track_id');
                $output .= view('layouts.showmore-btns.show_more_track_comments',compact('lastId','track_id'))->render();

            }else{
                $output .= view('layouts.showmore-btns.no_more_track_comments')->render();

            }
            echo $output;
//            return response()->json(['html'=>$output]);


        }else{

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
    public function store(Request $request)
    {
        if ($request->ajax()){
            $valid = $request->validate(
                [
                    'track_id'=> ['required'] ,
                    'comment'=> ['required'] ,
                ]
            );

            $comment = new Comment() ;
            $comment->user_id = auth()->id() ;
            $comment->track_id = strtolower(trim($request->track_id)) ;
            $comment->comment = $request->comment ;

            if($comment->save()){
                $output = view('layouts.track_comment',compact('comment'))->render();
                session()->flash('message','Done');

                echo $output ;
            }else{
                session()->flash('message','Sorry');
            }

        }else{

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


            return view('show_track')->with([
                'comment_to_edit'=>$comment_to_edit ,
                'track'=>$track ,
                'comments'=>$comments,
                'lastId'=>\request()->lastId
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

            return redirect('/tracks/'. $comment->track_id);

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
        if(\request()->ajax()){
            if($comment->delete()){
                echo "Done";
            }else{
                echo "Sorry";
            }
        }else{

        }
    }
}
