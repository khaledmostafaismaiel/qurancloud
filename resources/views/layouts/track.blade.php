<div id="track_container-{{$track->id}}" data-track_container_id="{{$track->id}}" class="track_container flex-container-column-wrap">
    <div class="track" id="track-{{$track->id}}">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropDownMenuButton-{{$track->id}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            </button>
            <div class="dropdown-menu" aria-labelledby="dropDownMenuButton-{{$track->id}}">
                @if(auth()->id() == $track->user_id)
                    <span class="dropdown-item">
                        @if($track->id == $track_id_to_edit)
                            <form action="/tracks/{{$track->id}}" method="post">
                                {{csrf_field()}}
                                {{method_field('patch')}}
                                <input type="submit" value="EDIT">
                            </form>
                        @else
                            <a href="/tracks/{{$track->id}}/edit">Edit</a>
                        @endif
                    </span>
                    <div class="dropdown-divider"></div>
                    <span class="dropdown-item">
                        <form action="/tracks/{{$track->id}}" method="post">
                            {{csrf_field()}}
                            {{method_field('delete')}}
                            <input type="submit" value="Delete">
                        </form>
                    </span>
                @else
                    <span class="dropdown-item" id="track-menu-wrapper-item-report-{{$track->id}}">
                        <a href="#track-report-container-{{$track->id }}">Report</a>
                    </span>
                @endif
            </div>
        </div>


{{--        <div class="track-menu" id="{{$track->id}}">--}}
{{--            <img class="track-menu-more" src="/images/more.png" alt="" id="{{$track->id}}">--}}
{{--            <div class="track-menu-wrapper" id="track-menu-wrapper-{{$track->id}}">--}}
{{--                @if(auth()->id() == $track->user_id)--}}
{{--                    <span class="track-menu-wrapper-item">--}}
{{--                        @if($track->id == $track_id_to_edit)--}}
{{--                            <form action="/tracks/{{$track->id}}" method="post">--}}
{{--                                {{csrf_field()}}--}}
{{--                                {{method_field('patch')}}--}}
{{--                                <input type="submit" value="EDIT">--}}
{{--                            </form>--}}
{{--                        @else--}}
{{--                            <a href="/tracks/{{$track->id}}/edit">Edit</a>--}}
{{--                        @endif--}}
{{--                    </span>--}}
{{--                    <span class="track-menu-wrapper-item">--}}
{{--                        <form action="/tracks/{{$track->id}}" method="post">--}}
{{--                            {{csrf_field()}}--}}
{{--                            {{method_field('delete')}}--}}
{{--                            <input type="submit" value="Delete">--}}
{{--                        </form>--}}
{{--                    </span>--}}
{{--                @endif--}}

{{--                @if(auth()->id() != $track->user_id)--}}
{{--                    <span class="track-menu-wrapper-item" id="track-menu-wrapper-item-report-{{$track->id}}">--}}
{{--                        <a href="#track-report-container-{{$track->id }}">Report</a>--}}
{{--                    </span>--}}
{{--                @endif--}}
{{--            </div>--}}
{{--        </div>--}}
                <h3 class="track-name flex-item-row-wrap">
                    <a class="track-name-link" href="/tracks/{{$track->id}}">
                        {{$track->file_name}}
                    </a>
                </h3>
                <a href="/tracks/{{$track->id}}" class="track-created_at">
                    {{date("Y-m-d h:i:sa",strtotime($track->created_at))}}
                </a>




        <div class="flex-container-row-no_wrap">
            <div class=" track-first_section flex-container-column-wrap" >
                <a href="/users/{{$track->user_id}}">
                    <img src="/storage/uploads/profile_pictures/{{App\User::findorfail($track->user_id)->profile_picture}}" alt="User photo" class="track-first_section-photo">
                </a>
                <span class="track-owner-user_name"><a class="track-first_section-user_name-link" href="/users/{{App\User::findorfail($track->user_id)->id}}">{{App\User::findorfail($track->user_id)->full_name()}}</a></span>
            </div>
            <div class="track-second_section flex-container-column-wrap">

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
            <div class="track-third_section flex-container-column-wrap">
                @if(canILoveThisTrack($track) == -1)
                    <img src="/images/unlove.png" alt="User photo" class="track-third_section-love_photo" id="track-third_section-love_photo-{{$track->id}}">
                    <form method="POST" action="/trackLoves" class="">
                        {{csrf_field()}}
                        <input hidden type="text" name="track_id" value="{{$track->id}}" required>
                        <input type="submit"  class="track-third_section-love_btn"  name="submit" value="Love">
                    </form>
                @else
                    <img src="/images/love.png" alt="User photo" class="track-third_section-unlove_photo" id="track-third_section-unlove_photo-{{$track->id}}">
                    <form method="POST" action="/trackLoves/{{canILoveThisTrack($track)}}" class="">
                        {{csrf_field()}}
                        {{method_field('delete')}}
                        <input type="submit"  class="track-third_section-love_btn"  name="submit" value="unLove">
                    </form>
                @endif
                <a class="track-loves" @if($track->trackLoves()->count() > 0) href="#track-loves-container-{{$track->id}}" @endif>{{$track->trackLoves()->count()}} Love</a>
            </div>
        </div>
        <div class="track-caption">
            <textarea name="comment" id="caption" rows="3" readonly class="track-caption-input">{{$track->caption}}</textarea>
        </div>
    </div>

</div>


