<div class="col mb-4" id="track-{{$track->id}}">
    <div class="card h-100 text-center border-info track bg-dark">
        <table class="mt-3">
            <tr>
                <td class="">
                    <img src="/storage/uploads/profile_pictures/{{App\User::findorfail($track->user_id)->profile_picture}}" class="card-img-top mb-1 track-track_owner-pic" alt="..." data-user-id="{{$track->user_id}}">
                    <span class="track-track_owner-name text-white" data-user-id="{{$track->user_id}}">
                        {{App\User::findorfail($track->user_id)->full_name()}}
                    </span>
                </td>
                <td class="">
                    @include('layouts.track.track-dropdown_menu')
                </td>
            </tr>
            <tr class="">
                <td class="text-white track-created_at">
                    {{date("Y-m-d h:i:sa",strtotime($track->created_at))}}
                </td>
                <td>
                    &nbsp;
                </td>
            </tr>
        </table>

        <div class="card-body" data-track_id="{{$track->id}}">
            <h4 class="card-title text-white track-track_name" data-track-id="{{$track->id}}">{{$track->file_name}}</h4>

            <div class="">
                <div class="track-down_buttons flex-container-row-no_wrap">
                    <img src="/images/media_play_btn.png" alt="play" data-src="/storage/uploads/tracks/{{$track->temp_name}}" data-track_id="{{$track->id}}" class="flex-item-row-wrap track-down_buttons-icon play" id="play">
                    <img src="/images/media_addtoplaylist_btn.png" alt="addtoplaylist" class="flex-item-row-wrap track-upper_buttons-icon add_to_play_list add_to_play_list">
                </div>
            </div>

            <input  class="w-100 h-auto p-2 card-text text-white bg-dark border-0 edit_track" readonly value="{{$track->caption}}">
            <button class="btn btn-primary submit_edit_track d-none">Comment</button>
        </div>

        <div class="card-footer bg-transparent border-info d-flex justify-content-around align-items-center">
            @if(canILoveThisTrack($track) == -1)
                <img src="/images/unlove.png" alt="User photo" class="track-love_photo" id="track-love_photo-{{$track->id}}" data-id="{{$track->id}}"  >
            @else
                <img src="/images/love.png" alt="User photo" class="track-unlove_photo" id="track-unlove_photo-{{$track->id}}" data-id="{{$track->id}}" data-track_love_id="{{canILoveThisTrack($track)}}">
            @endif
            @include('layouts.track.track_loves_modal')
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
<div class="modal fade {{--offset-xl-5 offset-lg-4 offset-md-4 offset-sm-3--}} track_loves_script" id="track-loves-{{$track->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="track-loves-Label-{{$track->id}}" aria-hidden="true" data-track_id="{{$track->id}}">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="track-loves-Label-{{$track->id}}">{{$track->trackLoves()->count()}} Loves</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center modal-body-track-loves">
                <table class="modal-body-track-loves-table" id="modal-body-track-loves-table_{{$track->id}}">

                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
