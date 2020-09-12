<?php

namespace App\Http\Controllers;

use App\Track;
use App\Comment ;
use http\QueryString;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class TracksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd("index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd("create");

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \request()->validate([
                'file_upload' => 'required',
            ]
        );

        if ($request->hasFile('file_upload')) {

            $file_name_with_extention = $request->file('file_upload')->getClientOriginalName();
            $file_name = pathinfo($file_name_with_extention, PATHINFO_FILENAME);
            $extention = $request->file('file_upload')->getClientOriginalExtension();
            if ($extention != "mp3") {
                return back() ;
            }
            $temp_name = generateRandomString().".".$extention;
            $path = $request->file('file_upload')->storeAs('public/uploads/tracks', $temp_name);
            $size = $request->file('file_upload')->getSize();

            if (Track::create([
                'user_id' => auth()->id(),
                'file_name' => pathinfo($file_name_with_extention, PATHINFO_FILENAME),
                'type' => $extention,
                'size' => $size,
                'caption' => $request->caption,
                'temp_name' => $temp_name,
            ])) {
                session()->flash('message', 'Done');
                return back();
            } else {
                session()->flash('message', 'Sorry');
                return back();
            }
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function show(Track $track)
    {
        $comments = $track->Comments()->simplePaginate(5);

        $comment_to_edit = null ;
        $track_id_to_edit = null ;
        $tracks_or_track_or_not = 'track' ;
        return view('show_track',compact('track','comments' ,'comment_to_edit','track_id_to_edit','tracks_or_track_or_not'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function edit(Track $track)
    {
        $track_id_to_edit = $track->id ;
        $tracks_or_track_or_not = 'track' ;

        return back(compact('tracks_or_track_or_not'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Track $track)
    {
        dd("update");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function destroy(Track $track)
    {
        // First remove the database entry
        if($track->delete()) {
            // then remove the file
            // Note that even though the database entry is gone, this object
            // is still around (which lets us use $this->image_path()).
//            if(unlink(storage_path('app/uploads/tracks/'.$track->temp_name))){
//                session()->flash('message','Done');
//            }else{
//                session()->flash('message',"Sorry");
//            }
        } else {
            // database delete failed
            session()->flash('message',"Sorry");

        }

        return back();
    }

    public function search(Request $request,$user_id)
    {
        dd("you should make search with get request not a post");
        $search_for = /*strtolower*/($request->search) ;
        $tracks = Track::all()->where('file_name',$search_for) ;
        $comment_to_edit = null ;
        return view('index',compact('tracks','comment_to_edit'));
    }

    public function reportTrack(Request $request,$track_id)
    {
        $validate = $request->validate([
            'reason'=>'required',
        ]);
        return back();
    }
}
