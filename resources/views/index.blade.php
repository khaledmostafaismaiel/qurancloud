@extends('layouts.master_layout')
@section('content')
    @include('layouts.track_form_add_track')
    @foreach($tracks as $track)
        @include('layouts/track')
        <div id="track-comments-container-{{$track->id}}" data-track-comments-container-id="{{$track->id}}" class="track-comments-container flex-container-column-wrap" >
            @include('layouts.track_form_add_comment')

            @if(($track->comments != null) && ($comment = $track->Last_comment()))
                @include('layouts.track_comment')
            @endif
        </div>
    @endforeach
    <div class="master_view-show_more" id="master_view-show_more">
        <button type="button" id="master_view-show_more-button" class="btn btn-info btn-block "{{-- in side the class disabled--}} data-last_id="{{$lastId}}">
            Show More
        </button>
    </div>
@endsection
