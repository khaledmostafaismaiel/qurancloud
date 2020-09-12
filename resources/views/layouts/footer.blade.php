</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
{{--    <script  src="/bootstrap-4.5.2-dist/js/bootstrap.js" type="module"> </script>--}}
<script  src="/js/app.js" type="module"> </script>



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
