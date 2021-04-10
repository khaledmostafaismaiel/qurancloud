<?php

namespace App\Http\Controllers;

use App\Track;
use App\trackLoves;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTrackLoveRequest;

class TrackLovesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (\request()->ajax()){
            if (\request()->pageNumber >= 1){
                $loves = Track::findorfail(\request('track_id'))->trackLoves()->simplepaginate(10) ;

                $output='';
                if (! $loves->isEmpty()){
                    foreach ($loves as $love){
                        $output .= view('layouts.popup.lover',compact('love'))->render();
                    }
                }else{

                }
                echo $output;

            }else{

            }
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTrackLoveRequest $request)
    {
        if($request->ajax()){
            $id = trackLoves::insertGetId([
                'user_id'=> auth()->id(),
                'track_id'=> strtolower(trim(request('track_id'))) ,
            ]);
            if($id){
                return response()->json([
                    'track_love_id'=>$id,
                    'priorty'=>"success",
                    'title'=>'Success',
                    'message'=>"Love successfully added"
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

    /**
     * Display the specified resource.
     *
     * @param  \App\trackLoves  $trackLove
     * @return \Illuminate\Http\Response
     */
    public function show(trackLoves $trackLove)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\trackLoves  $trackLove
     * @return \Illuminate\Http\Response
     */
    public function edit(trackLoves $trackLove)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\trackLoves  $trackLoves
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, trackLoves $trackLoves)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\trackLoves  $trackLove
     * @return \Illuminate\Http\Response
     */
    public function destroy(trackLoves $trackLove)
    {
        if(\request()->ajax()){
            if($trackLove->delete()){
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
