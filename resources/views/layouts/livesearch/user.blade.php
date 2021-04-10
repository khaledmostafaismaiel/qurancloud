<tr>
    <td><img src="/storage/uploads/profile_pictures/{{$user->profile_picture}}" alt="" class="user-nav__user-photo">{{$user->full_name()}}</td>
    <td>
        @include('layouts.Profile_Navigation.followUnfollowAction',['user'=>$user])
    </td>
    <td></td>
</tr>
