<div class="show-track_script show_track_container" data-track_id="{{$track->id}}">
    @include('layouts.track.track')
    <div id="track-comments-container-{{$track->id}}" class="track-comments-container col">
        @include('layouts.track-comment.track_comment',with(['addTrackComment'=>1]))
        <div id="track_comments" data-track_id="{{$track->id}}" >

        </div>
    </div>
</div>
