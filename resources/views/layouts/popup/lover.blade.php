<tr class="row mt-2 ml-2">
    <td class="col-6 row">
        <img src="/storage/uploads/profile_pictures/{{App\User::findorfail($love->user_id)->profile_picture}}" alt="User photo" class="track-comment-photo"  data-user-id="{{App\User::findorfail($love->user_id)->id}}">
        <span class="mt-4">
            {{App\User::findorfail($love->user_id)->full_name()}}
        </span>
    </td>
    <td class="col-4">
        <span class="text-dark">{{date("Y-m-d h:i:sa",strtotime($love->created_at))}}</span>
    </td>
    <td class="col-2 mt-4">
        @include('layouts.Profile_Navigation.followUnfollowAction',['user'=>App\User::findorfail($love->user_id)])
    </td>
</tr>
