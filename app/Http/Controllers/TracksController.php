<?php

namespace App\Http\Controllers;

use App\Track;
use App\Comment ;
use App\User;
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
        if (\Request()->ajax()){
            if(request()->pageNumber >= 1){
                $tracks = User::findOrfail(\request('user_id'))->Tracks()->simplePaginate(12);
            }else{

            }
            $output='';
            if(! $tracks->isEmpty()){

                foreach ($tracks as $track) {
                    $output .= view('layouts.track',compact('track'))->render();
                }

            }else{

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
        if (\request()->ajax()){
            echo view('layouts.track_options',compact('track'))->render();
        }else{
            return view('show_track',compact('track'));

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function edit(Track $track)
    {

        $track_to_edit = $track ;
        $lastId = \request()->lastId;
        $comments = $track->Comments;
        return view('show_track',compact('track','track_to_edit','lastId','comments'));
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
        $validate = $request->validate([
           'caption'=>'required'
        ]);

        $track->caption = $request->caption;
        if ($track->save()){

            return redirect('/tracks/'. $track->id);
        }else{

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function destroy(Track $track)
    {
        if(\request()->ajax()){
            // First remove the database entry
            if($track->delete()) {
                // then remove the file
                // Note that even though the database entry is gone, this object
                // is still around (which lets us use $this->image_path()).
//            if(unlink(storage_path('app/uploads/tracks/').$track->temp_name)){
//                session()->flash('message','Done');
//            }else{
//                session()->flash('message',"Sorry");
//            }
            } else {
                // database delete failed
                session()->flash('message',"Sorry");

            }


            if (back()->getTargetUrl() == "http://localhost:8000/tracks/".$track->id ){

                return redirect('/');

            }else{
                return back();
            }
        }else{

        }
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
