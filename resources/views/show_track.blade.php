@extends('layouts.master_layout')
@section('content')
    <div class="show_track_container">
        @include('layouts/track')
        <div class="track-comments-container flex-container-column-wrap">
            @include('layouts.track_form_add_comment')
            @foreach($comments as $comment)
                @include('layouts.track_comment')
            @endforeach
        </div>
    </div>
    <div class="master_view-pagination">
        {{$comments->onEachSide(1)->links()}}
    </div>
@endsection

