<ul class="profile-nav">
{{--        <li class="profile-nav__item">--}}
{{--            <a href="/users/{{App\User::first()->id}}" class="profile-nav__link">--}}
{{--                <img src="/images/{{App\User::first()->profile_picture}}" alt="User photo" class="user-nav__user-photo">--}}
{{--                <span>{{App\User::first()->full_name()}}</span>--}}
{{--            </a>--}}
{{--        </li>--}}

    <li class="profile-nav__item /*profile-nav__item--active*/">
        <a href="/users/{{$user->id}}/about" class="profile-nav__link">
            <svg class="profile-nav__icon">
                <use xlink:href="/images/sprite.svg#icon-home"></use>
            </svg>
            <span>About</span>
        </a>
    </li>

    <li class="profile-nav__item">
        <a href="/friends/followers/{{$user->id}}" class="profile-nav__link">
            <svg class="profile-nav__icon">
                <use xlink:href="/images/sprite.svg#icon-chevron-thin-right"></use>
            </svg>
            <span>
                Followers
                @if( App\User::findorfail($user->id)->Followers()->count() != 0 )
                    ( {{  App\User::findorfail($user->id)->Followers()->count() }} )
                @endif
            </span>
        </a>
    </li>

    <li class="profile-nav__item">
        <a href="/friends/following/{{$user->id}}" class="profile-nav__link">
            <svg class="profile-nav__icon">
                <use xlink:href="/images/sprite.svg#icon-chevron-thin-right"></use>
            </svg>
            <span>
                Following
                @if(App\User::findorfail($user->id)->followings()->count() != 0)
                    ( {{  App\User::findorfail($user->id)->followings()->count() }} )
                @endif
            </span>
        </a>
    </li>

    @if(auth()->id() == $user->id)
        <li class="profile-nav__item">
            <a href="/messages" class="profile-nav__link">
                <svg class="profile-nav__icon">
                    <use xlink:href="/images/sprite.svg#icon-chat"></use>
                </svg>
                <span>Chats</span>
            </a>
        </li>

        <li class="profile-nav__item">
            <a href="/users/{{auth()->id()}}/settings" class="profile-nav__link">
                <svg class="profile-nav__icon">
                    <use xlink:href="/images/sprite.svg#icon-key"></use>
                </svg>
                <span>settings</span>
            </a>
        </li>
    @else
        <li class="profile-nav__item">
            <a href="/messages" class="profile-nav__link">
                <svg class="profile-nav__icon">
                    <use xlink:href="/images/sprite.svg#icon-chat"></use>
                </svg>
                <span>Chat</span>
            </a>
        </li>

        <li class="">
            <form method="POST" action="/friends" class="">
                {{csrf_field()}}
                <input type="text" hidden name="following_user_id" value="{{$user->id}}">
                <input type="submit"  class="btn-follow-form " name="submit" value="FOLLOW">
            </form>
        </li>
    @endif

</ul>
