<div class="table-responsive">
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Track Name</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
            @foreach($playlistTracks as $key=>$track)
                <tr>
                    <th scope="row">{{++$key}}</th>
                    <td>
                        <a href="/tracks/{{\App\Track::findOrFail($track->track_id)->id}}">
                            {{\App\Track::findOrFail($track->track_id)->file_name}}
                        </a>
                    </td>
                    <td>
                        <img src="/images/media_play_btn.png" alt="play" data-src="/storage/uploads/tracks/{{\App\Track::findOrFail($track->track_id)->temp_name}}" data-track_id="{{\App\Track::findOrFail($track->track_id)->id}}" class="flex-item-row-wrap track-down_buttons-icon play" id="play">
                        <img src="/images/media_removefromplaylist_btn.png" alt="delete"  data-playlist_record_id="{{$track->id}}" class="flex-item-row-wrap track-down_buttons-icon remove_from_playlist">
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
