</div>
{{--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>--}}
{{--<script  src="../../../public/js/script.js" type="text/javascript"> </script>--}}
<script  >
    'use strict' ;
//
    var songName ;
    var audioPlayer ;

    var trackMore = document.getElementsByClassName('track-more');
    var trackMenuWrapper = document.getElementsByClassName('rack-menu-wrapper');

    var toDisplay = 0 ;
    for(var i=0 ; i < trackMore.length ; ++i){
        trackMore[i].addEventListener('click',function () {
            if(toDisplay == 1){
                console.log(toDisplay);
//
                trackMenuWrapper[i].style.display = 'block';
                toDisplay =  0 ;
            }else{
                console.log(toDisplay);
//
                trackMenuWrapper[i].style.display = 'none';
                toDisplay = 1 ;
//
            }
        });
    }
//
//
//
    var doMute = 1 ;
    var doAddToPlaylist = 1 ;
//

//
    //for volume
    var volumeStart = document.getElementsByClassName('volume_start');
    var volume = document.getElementsByClassName('volume');
    var volumeEnd = document.getElementsByClassName('volume_end');
    for(var i=0 ; i < volume.length ; ++i){
        volume[i].addEventListener('change',function () {
            // volumeEnd[i].innerHTML = this.getAttribute("value") ;
        });
        volumeStart[i].innerHTML = "0" ;
        volumeEnd[i].innerHTML = "100" ;
//
    }
//
    //for repeat
    var repeat = document.getElementsByClassName('repeat');
    for(var i=0 ; i < repeat.length ; ++i){
        repeat[i].addEventListener('click',function (event){
            console.log("repeatMethod");
        });
    }
    //for shuffle
    var shuffle = document.getElementsByClassName('shuffle');
    for(var i=0 ; i < shuffle.length ; ++i){
        shuffle[i].addEventListener('click',function (event){
            console.log("shuffleMethod");
        });
    }
    //for play list
    var add_to_playList = document.getElementsByClassName('add_to_play_list');
    for(var i=0 ; i < add_to_playList.length ; ++i){
        add_to_playList[i].addEventListener('click',function (event){
            if(doAddToPlaylist == 0){
                event.target.src = '/images/media_addtoplaylist_btn.png';
                doAddToPlaylist=1 ;
            }else{
                event.target.src = '/images/media_removefromplaylist_btn.png';
                doAddToPlaylist = 0;
            }
        });
    }
    //for mute
    var mute = document.getElementsByClassName('mute');
    for(var i=0 ; i < mute.length ; ++i){
        mute[i].addEventListener('click',function (event){
            if(! doMute){
                event.target.src = '/images/media_mute_btn.png';
                doMute=1 ;
            }else{
                event.target.src = '/images/media_unmute_btn.png';
                doMute = 0;
            }
        });
    }
//
    //for last track
    var lastTrack = document.getElementsByClassName('last_track');
    for(var i=0 ; i < lastTrack.length ; ++i){
        lastTrack[i].addEventListener('click',function (event){
            console.log("lastTrackMethod");
        });
    }
    //for back 5 sec
    var back5Sec = document.getElementsByClassName('back_5_sec');
    for(var i=0 ; i < back5Sec.length ; ++i){
        back5Sec[i].addEventListener('click',function (event){
            console.log("back5secMethod");
        });
    }
    //for play
    var play = document.getElementsByClassName('play');
    for(var i=0 ; i < play.length ; ++i){
        play[i].addEventListener('click',function (event){
            songName = event.target.getAttribute('data-src');
            audioPlayer = document.querySelector('#player'); //there are audio or not
//
            if(! audioPlayer){
                audioPlayer = document.createElement('audio');
                audioPlayer.id = 'player';
                audioPlayer.src = songName;
                document.body.appendChild(audioPlayer);
                audioPlayer.play();
                event.target.src = '/images/media_pause_btn.png';
                // event.target.id = 'playing' ;
                console.log(isNaN(audioPlayer.duration));
//
                audioPlayer.addEventListener("ended",function () {
                    audioPlayer.parentNode.removeChild(audioPlayer);
                    // event.target.id = '';
                    event.target.src = '/images/media_play_btn.png';
                });
                // var songPlaying = document.querySelector('#player');
                // console.log(songPlaying.duration());
            }else{
//
                if(songName === audioPlayer.getAttribute('src')){
                    if(audioPlayer.paused){
                        audioPlayer.play();
                        event.target.src = '/images/media_pause_btn.png';
//
                    }else{
                        audioPlayer.pause();
                        event.target.src = '/images/media_play_btn.png';
//
                    }
                }else{
                    audioPlayer.src = songName ;
                    audioPlayer.play();
                    for(var j=0 ; j < play.length ; ++j) {
                        play[j].setAttribute('src','/images/media_play_btn.png');
                    }
                    // if(document.querySelector('#playing')){
                    //     document.querySelector('#playing').id = '' ;
                    // }else{
                    //     document.querySelector('#paused').id = '' ;
                    // }
                    // event.target.id='playing';
//
                    event.target.src = '/images/media_pause_btn.png';
//
                }
//
            }
//
        });
    }
    //for next 5 sec
    var next5Sec = document.getElementsByClassName('next_5_sec');
    for(var i=0 ; i < next5Sec.length ; ++i){
        next5Sec[i].addEventListener('click',function (event){
            console.log("next5secMethod");
        });
    }
    //for next track
    var nextTrack = document.getElementsByClassName('next_track');
    for(var i=0 ; i < nextTrack.length ; ++i){
        nextTrack[i].addEventListener('click',function (event){
            console.log("nextTrackMethod");
        });
    }
//
    //for duration
    var durationStart = document.getElementsByClassName('duration_start');
    var duration = document.getElementsByClassName('duration');
    var durationEnd = document.getElementsByClassName('duration_end');
    for(var i=0 ; i < duration.length ; ++i){
        // duration[i].addEventListener('click',function (event){
        durationStart[i].innerHTML = "0" ;
        durationEnd[i].innerHTML = "3:06" ;
//
        // });
    }
//
//
    // var track = document.getElementById('track');
    // var addComment = document.getElementById('add_comment');
    // var comment = document.getElementById('track_comment') ;
//
    // $("div[id^track]").css("border","3px solid red");
    // $("eventTarget").on("click" , function(event){ } ) ;
    @if($_SERVER['PHP_SELF'] == '/index.php' )
        var tracks = document.getElementsByClassName('track');
        for(var i = 0 ; i < tracks.length ; ++i){
            tracks[i].addEventListener('click',function (event){
                // this method for togglePreview
//
                var trackId = this.id ; //track-1
                var addCommentId = trackId.replace('track','add_comment') //add_comment-1
                var trackCommentId = trackId.replace('track','track_comment') //track_comment-1
                var addComment = document.getElementById(addCommentId);
                var trackComment = document.getElementById(trackCommentId);
//
                if (addComment.style.display == "none"){
                    addComment.style.display = "block" ;
                    trackComment.style.display = "block" ;
                }else{
                    addComment.style.display = "none" ;
                    trackComment.style.display = "none" ;
                }
//
                console.log(event.target);
                // console.log(trackId);
                // console.log(addCommentId);
                // console.log(trackCommentId);
            }) ;
        }
    @endif
{{----}}
    function myFunction(){
        var popUp = document.getElementById("myPopup");
        popUp.classList.toggle("show");
    }
//
    // var popup = document.getElementsByClassName("popup");
    // var popupText = document.getElementsByClassName("popup_text");
    // for(var i=0 ; i < popup.length ; ++i) {
    //     popup[i].addEventListener('click', function (event) {
    //         popupText[i].classList.toggle("show");
    //     });
    // }
//
//
    document.getElementById('form-sign_up-submit-gmail').addEventListener('click',function () {
        document.querySelector('.popup-sign-up-with-gmail').style.display = 'flex' ;
    });
    document.querySelector('.popup-sign-up-with-gmail-close').addEventListener('click',function () {
        document.querySelector('.popup-sign-up-with-gmail').style.display = 'none ' ;
    });
//
//
    window.onload = function () {
        @if($_SERVER['PHP_SELF'] == '/index.php' )
            var tracks = document.getElementsByClassName('track');
            for(var i = 0 ; i < tracks.length ; ++i){
//
                var trackId = tracks[i].id ; //track-1
                var addCommentId = trackId.replace('track','add_comment') //add_comment-1
                var trackCommentId = trackId.replace('track','track_comment') //track_comment-1
                var addComment = document.getElementById(addCommentId);
                var trackComment = document.getElementById(trackCommentId);
//
                if (addComment.style.display == "none"){
                    addComment.style.display = "block" ;
                    trackComment.style.display = "block" ;
                }else{
                    addComment.style.display = "none" ;
                    trackComment.style.display = "none" ;
                }
            }
        @endif
    }
//
</script>


{{----}}

{{--<div class="popup-sign-up-with-gmail">--}}
{{--        <div class="popup-sign-up-with-gmail-content">--}}
{{--            <div class="popup-sign-up-with-gmail-close">+</div>--}}
{{--            <img src="https://www.iconfinder.com/data/icons/flatastic-4-1/256/user_red-512.png" alt="" class="user-nav__user-photo">--}}
{{--            <form method="POST" action="/users">--}}
{{--                {{ csrf_field() }}--}}
{{--                    <div class="form-sign_up-first_name">--}}
{{--                        <label class="form-sign_up-first_name-label" for="first_name">First Name</label>--}}
{{--                        <input class="form-sign_up-first_name-input" id="first_name" name="first_name" type="text" value=""  placeholder="Enter Your First Name" required>--}}
{{--                    </div>--}}

{{--                    <div class="form-sign_up-second_name">--}}
{{--                        <label class="form-sign_up-second_name-label" for="second_name">Second Name</label>--}}
{{--                        <input class="form-sign_up-second_name-input" id = "second_name" name = "second_name" type="text"  value=""  placeholder="Enter Your Second Name" required>--}}
{{--                    </div>--}}

{{--                    <div class="form-sign_up-user_name">--}}
{{--                        <label class="form-sign_up-user_name-label" for="user_name">User name</label>--}}
{{--                        <input class="form-sign_up-user_name-input" id="user_name" name="user_name" type="text" value=""   placeholder="Enter Your E_mail" required>--}}
{{--                    </div>--}}

{{--                    <div class="form-sign_up-password">--}}
{{--                        <label class="form-sign_up-password-label"  for="password">Password</label>--}}
{{--                        <input class="form-sign_up-password-input"  id="password" name="password"  type="password"   value=""  placeholder="Enter Your Password" required>--}}
{{--                    </div>--}}

{{--                    <div class="form-sign_up-password_confirmation">--}}
{{--                        <label class="form-sign_up-password_confirmation-label" for="password_confirmation">Confirm Password</label>--}}
{{--                        <input class="form-sign_up-password_confirmation-input" id="password_confirmation" name="password_confirmation" type="password"   value="" placeholder="Confirm Your Password" required>--}}
{{--                    </div>--}}

{{--                    <div class="form-sign_up-gender">--}}
{{--                        <label class="form-sign_up-gender-label" for="gender">Gender</label>--}}
{{--                        <select name="gender" id=""  size="1" class="form-sign_up-gender-input" >--}}
{{--                            <option value="male">Male</option>--}}
{{--                            <option value="female">Female</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}

{{--                    <div class="form-sign_up-not_robot">--}}
{{--                        <label class="form-sign_up-not_robot-label" for="not_robot">I'm not robot.</label>--}}
{{--                        <input class="form-sign_up-not_robot-input" id="not_robot" name="not_robot" value="1" type="checkbox" hidden>--}}
{{--                    </div>--}}

{{--                    <div class="form-sign_up-terms_of_conditions">--}}
{{--                        <label class="form-sign_up-terms_of_conditions-label" for="terms_of_conditions" >I agree with all <a href="/users/terms_of_conditions" class="form-sign_up-terms_of_conditions-link">terms of conditions.</a></label>--}}
{{--                        <input class="form-sign_up-terms_of_conditions-input"  id="terms_of_conditions" name="terms_of_conditions" value= "1"  type="checkbox" hidden>--}}
{{--                    </div>--}}

{{--                    <div class="form-sign_up-submit flex-container-row-wrap">--}}
{{--                        <input class="form-sign_up-submit-sign_up btn flex-item-row-wrap" name="submit_sign_up" type="submit" value="sign up"/>--}}
{{--                    </div>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}

    @if($tracks_or_track_or_not == 'tracks')
        @foreach($tracks as $track)
            @if($track != null)
                <div class="popup" id="track-loves-container-{{$track->id }}">
                    <div  class="popup__content  flex-container-column-wrap">
                        <a href="#track-{{$track->id}}" class="popup__close">&times;</a>
                        @foreach($track->trackLoves()->paginate(1) as $love)
                            <div class="table-loves-record">
                            <span class="flex-container-column-wrap">
                                <a href="/users/{{$love->user_id}}">
                                    <img src="/storage/uploads/profile_pictures/{{$profile_pic = App\User::findorfail($love->user_id)->profile_picture}}" alt="User photo" class="track-comment-photo">
                                </a>
                                <a href="/users/{{App\User::findorfail($love->user_id)->id}}" class="flex-item-row-wrap table-loves-record-user_name">
                                    {{App\User::findorfail($love->user_id)->full_name()}}
                                </a>
                            </span>
                                <span class="table-loves-record-created_at">{{date("Y-m-d h:i:sa",strtotime($love->created_at))}}</span>
                            </div>
                        @endforeach
                        <div class="master_view-pagination">
{{--                            {{$track->trackLoves()->onEachSide(1)->links()}}--}}
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
        @foreach($tracks as $track)
            @if($track->last_comment() != null)
                <div class="popup" id="comment-loves-container-{{$track->last_comment()->id }}">
                    <div  class="popup__content  flex-container-column-wrap">
                        <a href="#track_comment-{{$track->last_comment()->id}}" class="popup__close">&times;</a>
                        @foreach($track->last_comment()->commentLoves()->paginate(1) as $love)
                            <div class="table-loves-record">
                            <span class="flex-container-column-wrap">
                                <a href="/users/{{$love->user_id}}">
                                    <img src="/storage/uploads/profile_pictures/{{$profile_pic = App\User::findorfail($love->user_id)->profile_picture}}" alt="User photo" class="track-comment-photo">
                                </a>
                                <a href="/users/{{App\User::findorfail($love->user_id)->id}}" class="flex-item-row-wrap table-loves-record-user_name">
                                    {{App\User::findorfail($love->user_id)->full_name()}}
                                </a>
                            </span>
                                <span class="table-loves-record-created_at">{{date("Y-m-d h:i:sa",strtotime($love->created_at))}}</span>
                            </div>
                        @endforeach
                        <div class="master_view-pagination">
{{--                            {{$track->last_comment()->commentLoves()->onEachSide(1)->links()}}--}}
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
        @foreach($tracks as $track)
            @if($track != null)
                <div class="popup" id="track-report-container-{{$track->id }}">
                    <div  class="popup__content  flex-container-column-wrap">
                        <a href="#track-{{$track->id}}" class="popup__close">&times;</a>
                        <div class="table-loves-record">
                            <form action="/tracks/report/{{$track->id}}" method="post">
                                {{csrf_field()}}
                                <div class="">
                                    <label for="">Not Quran</label>
                                    <input type="radio" name="reason" value="1">
                                </div>
                                <div class="">
                                    <label for="">Not islamic content</label>
                                    <input type="radio" name="reason" value="2">                                    </div>
                                <div class="">
                                    <label for="">other</label>
                                    <input type="radio" name="reason" value="3">
                                </div>
                                <input type="submit" value="report">
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    @elseif($tracks_or_track_or_not == 'track')
        @if($track != null)
            <div class="popup" id="track-loves-container-{{$track->id }}">
                <div  class="popup__content  flex-container-column-wrap">
                    <a href="#track-{{$track->id}}" class="popup__close">&times;</a>
                    @foreach($track->trackLoves()->paginate(1) as $love)
                        <div class="table-loves-record">
                            <span class="flex-container-column-wrap">
                                <a href="/users/{{$love->user_id}}">
                                    <img src="/storage/uploads/profile_pictures/{{$profile_pic = App\User::findorfail($love->user_id)->profile_picture}}" alt="User photo" class="track-comment-photo">
                                </a>
                                <a href="/users/{{App\User::findorfail($love->user_id)->id}}" class="flex-item-row-wrap table-loves-record-user_name">
                                    {{App\User::findorfail($love->user_id)->full_name()}}
                                </a>
                            </span>
                            <span class="table-loves-record-created_at">{{date("Y-m-d h:i:sa",strtotime($love->created_at))}}</span>
                        </div>
                    @endforeach
                    <div class="master_view-pagination">
{{--                        {{$track->trackLoves()->onEachSide(1)->links()}}--}}
                    </div>
                </div>
            </div>
        @endif
        @if($track != null)
            @foreach($track->Comments as $comment)
                <div class="popup" id="comment-loves-container-{{$comment->id }}">
                    <div  class="popup__content  flex-container-column-wrap">
                        <a href="#track_comment-{{$comment->id}}" class="popup__close">&times;</a>
                        @foreach($comment->commentLoves()->paginate(1) as $love)
                            <div class="table-loves-record">
                                <span class="flex-container-column-wrap">
                                    <a href="/users/{{$love->user_id}}">
                                        <img src="/storage/uploads/profile_pictures/{{$profile_pic = App\User::findorfail($love->user_id)->profile_picture}}" alt="User photo" class="track-comment-photo">
                                    </a>
                                    <a href="/users/{{App\User::findorfail($love->user_id)->id}}" class="flex-item-row-wrap table-loves-record-user_name">
                                        {{App\User::findorfail($love->user_id)->full_name()}}
                                    </a>
                                </span>
                                <span class="table-loves-record-created_at">{{date("Y-m-d h:i:sa",strtotime($love->created_at))}}</span>
                            </div>
                        @endforeach
                        <div class="master_view-pagination">
{{--                            {{$comment->commentLoves()->onEachSide(1)->links()}}--}}
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
        <div class="popup" id="track-report-container-{{$track->id }}">
            <div  class="popup__content  flex-container-column-wrap">
                <a href="#track-{{$track->id}}" class="popup__close">&times;</a>
                <div class="table-loves-record">
                    <form action="/tracks/report/{{$track->id}}" method="post">
                        {{csrf_field()}}
                        <div class="">
                            <label for="">Not Quran</label>
                            <input type="radio" name="reason" value="1">
                        </div>
                        <div class="">
                            <label for="">Not islamic content</label>
                            <input type="radio" name="reason" value="2">                                    </div>
                        <div class="">
                            <label for="">other</label>
                            <input type="radio" name="reason" value="3">
                        </div>
                        <input type="submit" value="report">
                    </form>
                </div>
            </div>
        </div>
    @elseif($tracks_or_track_or_not == 'not')

    @else

    @endif


</body>
