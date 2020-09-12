<nav class="user-nav">
    <div>
        <div class="user-nav__icon-box" id="user-nav__friend_requests_box">
                <svg class="user-nav__icon">
                    <use xlink:href="/images/sprite.svg#icon-star"></use>
                </svg>
{{--            <img  class="user-nav__icon" src="../images/followers.png">--}}
            <span class="badge badge-pill badge-info">7</span>
        </div>

        <div class="notifi-box" id="friend_requests-box">
            <h2 class="notifi-box-h2">Friend Requests<span class="notifi-box-span">7</span></h2>
            @for($i=0;$i<7;++$i)
                <div class="notifi-item">
                    <img class="notifi-item-img" src="/storage/uploads/profile_pictures/{{auth()->user()->profile_picture}}">
                    <div class="notifi-item-text">
                        <h4 class="notifi-item-text-h4">{{auth()->user()->full_name()}}</h4>
                        <p class="notifi-item-text-p">Lorem ipsum lorem ipsum lorem ipsum</p>
                    </div>
                </div>
            @endfor
            <a href="/friends"  class="notifi-box-show_all">
                <button type="button" class="notifi-box-show_all-button">
                    Show All
                </button>
            </a>
        </div>
    </div>

{{--    <a href="{{route('messages.index')}}">--}}
    <div>
        <div class="user-nav__icon-box" id="user-nav__messages_box">
                <svg class="user-nav__icon">
                    <use xlink:href="/images/sprite.svg#icon-chat"></use>
                </svg>
{{--            <img  class="user-nav__icon" src="../images/messages.png">--}}
            <span class="user-nav__notification">13</span>
        </div>

        <div class="notifi-box" id="messages-box">
            <h2 class="notifi-box-h2">Messages<span class="notifi-box-span">13</span></h2>
            @for($i=0;$i<5;++$i)
                <a href="/chats/1">
                    <div class="notifi-item">
                        <img class="notifi-item-img" src="/storage/uploads/profile_pictures/{{auth()->user()->profile_picture}}">
                        <div class="notifi-item-text">
                            <h4 class="notifi-item-text-h4">{{auth()->user()->full_name()}}</h4>
                            <p class="notifi-item-text-p">Lorem ipsum lorem ipsum lorem ipsum</p>
                        </div>
                    </div>
                </a>
            @endfor
            <a href="/chats"  class="notifi-box-show_all">
                <button type="button" class="notifi-box-show_all-button">
                    Show All
                </button>
            </a>
        </div>
    </div>

    <div>
        <div class="user-nav__icon-box" id="user-nav__notifications_box">
            <svg class="user-nav__icon">
                <use xlink:href="/images/sprite.svg#icon-star"></use>
            </svg>
{{--                        <img  class="user-nav__icon" src="../images/notifications.png">--}}
            <span class="user-nav__notification">2</span>
        </div>

        <div class="notifi-box" id="notifications-box">
            <h2 class="notifi-box-h2">Notifications<span class="notifi-box-span">2</span></h2>
            @for($i=0;$i<2;++$i)
                <div class="notifi-item">
                    <img class="notifi-item-img" src="/storage/uploads/profile_pictures/{{auth()->user()->profile_picture}}">
                    <div class="notifi-item-text">
                        <h4 class="notifi-item-text-h4">{{auth()->user()->full_name()}}</h4>
                        <p class="notifi-item-text-p">Lorem ipsum lorem ipsum lorem ipsum</p>
                    </div>
                </div>
            @endfor
            <a href="/notifications"  class="notifi-box-show_all">
                <button type="button" class="notifi-box-show_all-button">
                    Show All
                </button>
            </a>
        </div>
    </div>


    <a class="user-nav__user-name" href="/users/{{auth()->id()}}">
        <img src="/storage/uploads/profile_pictures/{{auth()->user()->profile_picture}}" alt="User photo" class="user-nav__user-photo">
        <span>{{auth()->user()->full_name()}}</span>
    </a>

    <form method="post" action="/users/process_sign_out">
        {{csrf_field()}}
        <input type="submit" value="sign out" class="btn-comment-form-sign_out">
    </form>

{{--    <div class="user-nav__icon-box" id="icon-sign_out" >--}}
{{--        <input type="text" name="_token" hidden value="{{csrf_token()}}">--}}
{{--        <svg class="user-nav__icon">--}}
{{--            <use xlink:href="/images/sprite.svg#icon-home"></use>--}}
{{--        </svg>--}}
{{--    </div>--}}

</nav>
