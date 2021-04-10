<ul class="row d-flex justify-content-around p-3 profile-nav bg-dark">
    <li class="">
        @include('layouts.Profile_Navigation.about')
    </li>

    <li>
        @include('layouts.Profile_Navigation.followers')
    </li>

    <li>
        @include('layouts.Profile_Navigation.followings')
    </li>

    @if(auth()->id() == $user->id)
        <li>
            @include('layouts.Profile_Navigation.chats')
        </li>
    @else
        <li class="">
            @include('layouts.Profile_Navigation.chat')
        </li>

        <li class="">
            @include('layouts.Profile_Navigation.followUnfollowAction')
        </li>

    @endif
</ul>
