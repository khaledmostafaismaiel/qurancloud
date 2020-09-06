<nav class="user-nav">
    <a href="/friends">
        <div class="user-nav__icon-box">
                <svg class="user-nav__icon">
                    <use xlink:href="/images/sprite.svg#icon-star"></use>
                </svg>
{{--            <img  class="user-nav__icon" src="../images/followers.png">--}}
            <span class="user-nav__notification">7</span>
        </div>
    </a>

    <a href="/messages">
        <div class="user-nav__icon-box">
                <svg class="user-nav__icon">
                    <use xlink:href="/images/sprite.svg#icon-chat"></use>
                </svg>
{{--            <img  class="user-nav__icon" src="../images/messages.png">--}}
            <span class="user-nav__notification">13</span>
        </div>
    </a>

    <a href="/notifications">
        <div class="user-nav__icon-box">
            <svg class="user-nav__icon">
                <use xlink:href="/images/sprite.svg#icon-star"></use>
            </svg>
{{--                        <img  class="user-nav__icon" src="../images/notifications.png">--}}
            <span class="user-nav__notification">2</span>
        </div>
    </a>

    <a class="user-nav__user-name" href="/users/{{auth()->id()}}">
        <img src="/storage/uploads/profile_pictures/{{auth()->user()->profile_picture}}" alt="User photo" class="user-nav__user-photo">
        <span>{{auth()->user()->full_name()}}</span>
    </a>

    <form method="post" action="/users/process_sign_out">
        {{csrf_field()}}
        <input type="submit" value="sign out" class="btn-comment-form-sign_out">
    </form>


</nav>
