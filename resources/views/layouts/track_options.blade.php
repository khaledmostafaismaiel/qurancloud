<div class="col mb-4" id="track-{{$track->id}}">
    <div class="card h-100 text-center border-info track bg-dark">
        <table class="mt-3">
            <tr>
                <td class="">
                    <a href="/users/{{$track->user_id}}">
                        <img src="/storage/uploads/profile_pictures/{{App\User::findorfail($track->user_id)->profile_picture}}" class="card-img-top mb-1 track-track_owner-pic" alt="...">
                    </a>
                    <a class="track-track_owner-name" href="/users/{{App\User::findorfail($track->user_id)->id}}">
                        {{App\User::findorfail($track->user_id)->full_name()}}
                    </a>
                </td>
            </tr>
            <tr class="">
                <td class="track-created_at">
                    {{date("Y-m-d h:i:sa",strtotime($track->created_at))}}
                </td>
            </tr>
        </table>

        <div class="card-body">
            <a href="/tracks/{{$track->id}}" class="track-track_name">
                <h4 class="card-title text-white">{{$track->file_name}}</h4>
            </a>
            <div class="">
                <div class="track-upper_buttons flex-container-row-no_wrap">
                    <img src="/images/media_repeat_btn.png" alt="repeat" class="flex-item-row-wrap track-upper_buttons-icon repeat" id="repeat">
                    <img src="/images/media_shuffle_btn.png" alt="shuffle" class="flex-item-row-wrap track-upper_buttons-icon shuffle" id="shuffle">
                    <img src="/images/media_addtoplaylist_btn.png" alt="addtoplaylist" class="flex-item-row-wrap track-upper_buttons-icon add_to_play_list" id="add_to_play_list">
                    <img src="/images/media_mute_btn.png" alt="mute" class="flex-item-row-wrap track-upper_buttons-icon mute" id="mute">
                </div>
                <div class="track-volume flex-container-row-no_wrap">
                    <span class="volume_start" id="volume_start"></span>
                    <input class="track-volume-volume volume"  type="range" value="10" name="volume" id="volume">
                    <span class="volume_end" id="volume_end"></span>
                </div>
                <div class="track-down_buttons flex-container-row-no_wrap">
                    <img src="/images/media_last_btn.png" alt="last track" class="flex-item-row-wrap track-down_buttons-icon last_track" id="last_track">
                    <img src="/images/media_backward_btn.png" alt="back 5 sec" class="flex-item-row-wrap track-down_buttons-icon back_5_sec" id="back_5_sec">
                    <img src="/images/media_play_btn.png" alt="play" data-src="/storage/uploads/tracks/{{$track->temp_name}}" data-track_id="{{$track->id}}" class="flex-item-row-wrap track-down_buttons-icon play" id="play">
                    <img src="/images/media_forward_btn.png" alt="next 5 sec"  class="flex-item-row-wrap track-down_buttons-icon next_5_sec" id="next_5_sec">
                    <img src="/images/media_next_btn.png" alt="next track" class="flex-item-row-wrap track-down_buttons-icon next_track" id="next_track">
                </div>
                <div class="track-duration flex-container-row-no_wrap">
                    <span class="duration_start" id="duration_start"></span>
                    <input class="track-duration-duration duration" value="0" type="range"  id="duration">
                    <span class="duration_end" id="duration_end"></span>
                </div>
            </div>
            @if(isset($track_to_edit) && ($track_to_edit->id == $track->id))
                <form action="/tracks/{{$track->id}}" method="post">
                    {{csrf_field()}}
                    {{method_field('patch')}}
                    <input type="text" name="caption" value="{{$track->caption}}" class=" w-100 h-auto p-2">
                    <input type="submit" value="EDIT" class="btn btn-info">
                </form>
            @else
                <p class="card-text text-white">{{$track->caption}}</p>
            @endif

        </div>
    </div>
</div>
