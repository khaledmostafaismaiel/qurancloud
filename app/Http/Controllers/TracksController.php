<?php

namespace App\Http\Controllers;

use App\Jobs\StoreTrackJob;
use App\Track;
use App\User;
use http\QueryString;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTrackRequest;
use App\Http\Requests\UpdateTrackRequest;

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
                    $output .= view('layouts.track.track',compact('track'))->render();
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
    public function store(StoreTrackRequest $request)
    {

        if ($request->hasFile('file_upload')) {
            $file_name_with_extention = $request->file('file_upload')->getClientOriginalName();
            $extention = $request->file('file_upload')->getClientOriginalExtension();
            $temp_name = generateRandomString().".".$extention;
//            dispatch(new StoreTrackJob($request->file('file_upload'),$temp_name));
            $request->file('file_upload')->storeAs('public/uploads/tracks', $temp_name);
            $size = $request->file('file_upload')->getSize();

            if (Track::create([
                'user_id' => auth()->id(),
                'file_name' => pathinfo($file_name_with_extention, PATHINFO_FILENAME),
                'type' => $extention,
                'size' => $size,
                'caption' => $request->caption,
                'temp_name' => $temp_name,
            ])) {

                return back();
                return response()->json([
                    'priorty'=>"success",
                    'title'=>'Success',
                    'message'=>"Track successfully uploaded"
                ]);
            } else {
                return back();
                return response()->json([
                    'priorty'=>"danger",
                    'title'=>'Error',
                    'message'=>"Sorry,Try again"
                ]);
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
            echo view('AjaxRequests.show_track',compact('track'))->render();
        }else{
            return view('GetRequests.show_track',compact('track'));
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

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTrackRequest $request, Track $track)
    {
        if($request->ajax()){
            $track->caption = $request->caption;
            if ($track->update()) {
                return response()->json([
                    'priorty' => "success",
                    'title' => 'Success',
                    'message' => "Track edited successfully"
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
     * @param  \App\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function destroy(Track $track)
    {
        if(\request()->ajax()){

            if($track->delete()){
                unlink(storage_path('app/public/uploads/tracks/'.$track->temp_name));
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

    public function getTrackInfo($track_id){
        if (\request()->ajax()){
            $track = Track::findOrFail($track_id);
            echo view('layouts.track_options',compact('track'))->render();
        }else{
            return back();
        }
    }

}
