<?php

namespace App\Http\Controllers;

use App\PlaylistTracks;
use Illuminate\Http\Request;

class PlaylistTracksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\request()->ajax()) {
            $playlistTracks = auth()->user()->playlist->playlistTracks;
            echo view('layouts.playlistTable', compact('playlistTracks'))->render();
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PlaylistTracks  $playlistTracks
     * @return \Illuminate\Http\Response
     */
    public function show(PlaylistTracks $playlistTracks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PlaylistTracks  $playlistTracks
     * @return \Illuminate\Http\Response
     */
    public function edit(PlaylistTracks $playlistTracks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PlaylistTracks  $playlistTracks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlaylistTracks $playlistTracks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PlaylistTracks  $playlistTracks
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlaylistTracks $playlistTracks)
    {
        //
    }
}
