<?php

namespace App\Http\Controllers;

use App\Track;
use App\trackLoves;
use Illuminate\Http\Request;

class TrackLovesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = \request('track_id');
        $loves = Track::findorfail($id)->trackLoves ;
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
                'track_id'=> ['required'] ,
            ]
        );

        if(trackLoves::create([
            'user_id'=> auth()->id(),
            'track_id'=> strtolower(trim(request('track_id'))) ,
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
        dd("you are in track loves destroy");
        if($trackLove->delete()){
            session()->flash('message','Done');
            return back();

        }else{
            session()->flash('message','Sorry');
            return back();

        }
    }
}
