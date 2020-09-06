@extends('layouts.master_layout')
@section('content')
    @include('layouts.track_form_add_track')
    @include('layouts.profile_navigation')
    @foreach($tracks as $track)
        @include('layouts/track')
        <div class="track-comments-container flex-container-column-wrap">
            @include('layouts.track_form_add_comment')
            @if(($track->comments != null) && ($comment = $track->Last_comment()))
                @include('layouts.track_comment')
            @endif
        </div>
    @endforeach
    <div class="master_view-pagination">
        {{$tracks->onEachSide(1)->links()}}
    </div>
@endsection

