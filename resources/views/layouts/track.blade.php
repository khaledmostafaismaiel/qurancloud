<div class="col mb-4" id="track-{{$track->id}}">
    <div class="card h-100 text-center border-info track">
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
                <td class="">
                    @include('layouts.track-dropdown_menu')
                </td>
            </tr>
            <tr class="">
                <td class="track-created_at">
                    {{date("Y-m-d h:i:sa",strtotime($track->created_at))}}
                </td>
                <td>
                    &nbsp;
                </td>
            </tr>
        </table>

        <div class="card-body">
            <a href="/tracks/{{$track->id}}" class="track-track_name">
                <h4 class="card-title text-white">{{$track->file_name}}</h4>
            </a>
            <div class="">
{{--                <div class="track-upper_buttons flex-container-row-no_wrap">--}}
{{--                    <img src="/images/media_repeat_btn.png" alt="repeat" class="flex-item-row-wrap track-upper_buttons-icon repeat" id="repeat">--}}
{{--                    <img src="/images/media_shuffle_btn.png" alt="shuffle" class="flex-item-row-wrap track-upper_buttons-icon shuffle" id="shuffle">--}}
{{--                    <img src="/images/media_addtoplaylist_btn.png" alt="addtoplaylist" class="flex-item-row-wrap track-upper_buttons-icon add_to_play_list" id="add_to_play_list">--}}
{{--                    <img src="/images/media_mute_btn.png" alt="mute" class="flex-item-row-wrap track-upper_buttons-icon mute" id="mute">--}}
{{--                </div>--}}
{{--                <div class="track-volume flex-container-row-no_wrap">--}}
{{--                    <span class="volume_start" id="volume_start"></span>--}}
{{--                    <input class="track-volume-volume volume"  type="range" value="10" name="volume" id="volume">--}}
{{--                    <span class="volume_end" id="volume_end"></span>--}}
{{--                </div>--}}
                <div class="track-down_buttons flex-container-row-no_wrap">
{{--                    <img src="/images/media_last_btn.png" alt="last track" class="flex-item-row-wrap track-down_buttons-icon last_track" id="last_track">--}}
{{--                    <img src="/images/media_backward_btn.png" alt="back 5 sec" class="flex-item-row-wrap track-down_buttons-icon back_5_sec" id="back_5_sec">--}}
                    <img src="/images/media_play_btn.png" alt="play" data-src="/storage/uploads/tracks/{{$track->temp_name}}" data-track_id="{{$track->id}}" class="flex-item-row-wrap track-down_buttons-icon play" id="play">
{{--                    <img src="/images/media_forward_btn.png" alt="next 5 sec"  class="flex-item-row-wrap track-down_buttons-icon next_5_sec" id="next_5_sec">--}}
{{--                    <img src="/images/media_next_btn.png" alt="next track" class="flex-item-row-wrap track-down_buttons-icon next_track" id="next_track">--}}
                </div>
{{--                <div class="track-duration flex-container-row-no_wrap">--}}
{{--                    <span class="duration_start" id="duration_start"></span>--}}
{{--                    <input class="track-duration-duration duration" value="0" type="range"  id="duration">--}}
{{--                    <span class="duration_end" id="duration_end"></span>--}}
{{--                </div>--}}
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
        <div class="card-footer bg-transparent border-info d-flex justify-content-around align-items-center">
            @if(canILoveThisTrack($track) == -1)
                <img src="/images/unlove.png" alt="User photo" class="track-love_photo" id="track-love_photo-{{$track->id}}" data-id="{{$track->id}}">
                <form method="POST" action="/trackLoves" class="">
                    {{csrf_field()}}
                    <input hidden type="text" name="track_id" value="{{$track->id}}" required>
                    <input type="submit"  class="btn btn-danger"  name="submit" value="Love">
                </form>
            @else
                <img src="/images/love.png" alt="User photo" class="track-unlove_photo" id="track-unlove_photo-{{$track->id}}" data-id="{{$track->id}}">
                <form method="POST" action="/trackLoves/{{canILoveThisTrack($track)}}" class="">
                    {{csrf_field()}}
                    {{method_field('delete')}}
                    <input type="submit"  class="btn-warning"  name="submit" value="unLove">
                </form>
            @endif
            @include('layouts.track_loves_modal')
        </div>
    </div>
</div>





<!--Track Report Modal -->
<div class="modal fade" id="track-report-{{$track->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="track-report-label-{{$track->id}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="track-report-label-{{$track->id}}">Report {{$track->file_name}}</h5>
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
                    <input type="submit" value="report" class="btn btn-warning mt-3">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



<!-- Delete Track Modal -->
<div class="modal fade" id="delete_track-{{$track->id}}" tabindex="-1" aria-labelledby="delete_track-Label-{{$track->id}}" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete_track-Label-{{$track->id}}">Delete Track ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                You can edit the caption if you just need to change something.
            </div>
            <div class="modal-footer">
                <form action="/tracks/{{$track->id}}" method="post">
                    {{csrf_field()}}
                    {{method_field('delete')}}
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" value="delete" class="btn btn-danger delete-track-submit" data-id="{{$track->id}}" data-dismiss="modal">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Track Loves Modal -->
<div class="modal fade" id="track-loves-{{$track->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="track-loves-Label-{{$track->id}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="track-loves-Label-{{$track->id}}">{{$track->trackLoves()->count()}} Loves</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                @foreach($track->trackLoves as $love)
                    <div class="col mb-5">
                        <div class="">
                            <a href="/users/{{$love->user_id}}">
                                <img src="/storage/uploads/profile_pictures/{{$profile_pic = App\User::findorfail($love->user_id)->profile_picture}}" alt="User photo" class="track-comment-photo">
                            </a>
                        </div>
                        <div class="">
                            <a href="/users/{{App\User::findorfail($love->user_id)->id}}" class="">
                                {{App\User::findorfail($love->user_id)->full_name()}}
                            </a>
                        </div>
                        <div class="">
                            <span class="text-dark">{{date("Y-m-d h:i:sa",strtotime($love->created_at))}}</span>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="modal-footer">
                <button type="button" id="track-loves-popup" class="btn btn-success btn-block" data-last_id="" data-user_id="">Show More</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
