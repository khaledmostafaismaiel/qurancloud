<div id="track_container-{{$track->id}}" data-track_container_id="{{$track->id}}" class="track_container d-flex flex-column">
    <div class="track " id="track-{{$track->id}}">
            <table class="col">
                <tr>
                    <td class="col-3 d-flex justify-content-start">
                        <a href="/users/{{$track->user_id}}">
                            <img src="/storage/uploads/profile_pictures/{{App\User::findorfail($track->user_id)->profile_picture}}" alt="User photo" class="track-first_section-photo">
                        </a>
                    </td>
                    <td class="col-6">
                        <a class="track-name-link" href="/tracks/{{$track->id}}">
                            <input class="track-name-link-input bg-transparent text-white border-0 text-wrap" readonly value="{{$track->file_name}}">
                        </a>
                    </td>
                    <td class="col-3">
                        @include('layouts.track-dropdown_menu')

                    </td>
                </tr>
                <tr>
                    <td class="col-3 d-flex justify-content-start">
                        <span class="track-owner-user_name"><a class="track-first_section-user_name-link" href="/users/{{App\User::findorfail($track->user_id)->id}}">{{App\User::findorfail($track->user_id)->full_name()}}</a></span>
                    </td>
                    <td class="col-6 track-created_at text-white">
                        {{date("Y-m-d h:i:sa",strtotime($track->created_at))}}
                    </td>
                    <td class="col-3">
                        &nbsp;
                    </td>
                </tr>
            </table>
        <div class="flex-container-row-no_wrap">

            <div class="col-9 flex-container-column-wrap ">

                <div class="track-upper_buttons flex-container-row-wrap">
{{--                    <img src="/images/media_btn.png" alt="repeat" class="flex-item-row-wrap track-upper_buttons-icon repeat" id="repeat">--}}
{{--                    <img src="/images/media_shuffle_btn.png" alt="shuffle" class="flex-item-row-wrap track-upper_buttons-icon shuffle" id="shuffle">--}}
                    <img src="/images/media_addtoplaylist_btn.png" alt="addtoplaylist" class="flex-item-row-wrap track-upper_buttons-icon add_to_play_list" id="add_to_play_list">
                    <img src="/images/media_mute_btn.png" alt="mute" class="flex-item-row-wrap track-upper_buttons-icon mute" id="mute">
                </div>
                <div class="track-volume flex-container-row-no_wrap">
                    <span class="volume_start" id="volume_start"></span>
                    <input class="track-volume-volume volume"  type="range" value="" name="volume" id="volume">
                    <span class="volume_end" id="volume_end"></span>
                </div>
                <div class="track-down_buttons flex-container-row-wrap">
                    <img src="/images/media_back_btn.png" alt="last track" class="flex-item-row-wrap track-down_buttons-icon last_track" id="last_track">
                    <img src="/images/media_backward_btn.png" alt="back 5 sec" class="flex-item-row-wrap track-down_buttons-icon back_5_sec" id="back_5_sec">
                    <img src="/images/media_play_btn.png" alt="play" data-src="/storage/uploads/tracks/{{$track->temp_name}}" class="flex-item-row-wrap track-down_buttons-icon play" id="play">
                    <img src="/images/media_forward_btn.png" alt="next 5 sec"  class="flex-item-row-wrap track-down_buttons-icon next_5_sec" id="next_5_sec">
                    <img src="/images/media_next_btn.png" alt="next track" class="flex-item-row-wrap track-down_buttons-icon next_track" id="next_track">
                </div>
                <div class="track-duration flex-container-row-no_wrap">
                    <span class="duration_start" id="duration_start"></span>
                    <input class="track-duration-duration duration" value="" type="range" name="volume" id="duration">
                    <span class="duration_end" id="duration_end"></span>
                </div>
            </div>
            <div class="col-3 flex-container-column-wrap m-3">
                @if(canILoveThisTrack($track) == -1)
                    <img src="/images/unlove.png" alt="User photo" class="track-third_section-love_photo" id="track-third_section-love_photo-{{$track->id}}">
                    <form method="POST" action="/trackLoves" class="">
                        {{csrf_field()}}
                        <input hidden type="text" name="track_id" value="{{$track->id}}" required>
                        <input type="submit"  class="btn btn-danger"  name="submit" value="Love">
                    </form>
                @else
                    <img src="/images/love.png" alt="User photo" class="track-third_section-unlove_photo" id="track-third_section-unlove_photo-{{$track->id}}">
                    <form method="POST" action="/trackLoves/{{canILoveThisTrack($track)}}" class="">
                        {{csrf_field()}}
                        {{method_field('delete')}}
                        <input type="submit"  class="btn-warning"  name="submit" value="unLove">
                    </form>
                @endif
                    @include('layouts.track_loves_modal')

            </div>
        </div>
        <div class="track-caption">
            <textarea name="comment" id="caption" rows="1" readonly class="track-caption-input">{{$track->caption}}</textarea>
        </div>
    </div>

</div>
<!--Track Report Modal -->
<div class="modal fade" id="track-report-{{$track->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="track-report-label-{{$track->id}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="track-report-label-{{$track->id}}">Report</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <form action="/tracks/report/{{$track->id}}" method="post">
                    {{csrf_field()}}
                    <div class="form-check">
                        <input type="radio" name="reason" value="1" class="form-check-input mt-3" id="not_quran-{{$track->id}}">
                        <label  class="form-check-label mt-3" for="not_quran-{{$track->id}}">Not Quran</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="reason" value="2" class="form-check-input mt-3" id="not_islamic_content-{{$track->id}}">
                        <label  class="form-check-label mt-3" for="not_islamic_content-{{$track->id}}">Not islamic content</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="reason" value="3" class="form-check-input mt-3" id="other-{{$track->id}}">
                        <label class="form-check-label mt-3" for="other-{{$track->id}}">other</label>
                    </div>
                    <input type="submit" value="report" class="btn btn-warning w-100 mt-3">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
