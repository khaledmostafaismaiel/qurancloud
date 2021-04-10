<tr class="row mt-2 ml-2">
    <td class="col-10 row">
        <img src="/storage/uploads/profile_pictures/{{$follower->profile_picture}}" alt="User photo" class="track-comment-photo"  data-user-id="{{$follower->id}}">
        <span class="mt-4">
            {{$follower->full_name()}}
        </span>
    </td>
    <td class="col-2 mt-4">
        @include('layouts.Profile_Navigation.followUnfollowAction',['user'=>$follower])
    </td>
</tr>
