@extends('layouts.master_layout')
@section('content')
    <div class="show_track_container">
        @include('layouts/track')
        <div id="track-comments-container-{{$track->id}}" class="track-comments-container col">
            @include('layouts.track_form_add_comment')
            <div id="track_comments" class="show_track_script" data-track_id="{{$track->id}}" >

            </div>
        </div>
    </div>
@endsection


