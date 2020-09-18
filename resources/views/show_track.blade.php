@extends('layouts.master_layout')
@section('content')
    <div class="show_track_container">
        @include('layouts/track')
        <div id="track-comments-container" class="track-comments-container col">
            @include('layouts.track_form_add_comment')
            @foreach($comments as $comment)
                @include('layouts.track_comment')
            @endforeach
        </div>
    </div>
    <div class="master_view-show_more">
        <button type="button" id="master_view-show_more-button-comments" class="btn btn-success" data-last_id="{{$lastId}}"  data-track_id="{{$track->id}}">
            Show More
        </button>
    </div>
@endsection


