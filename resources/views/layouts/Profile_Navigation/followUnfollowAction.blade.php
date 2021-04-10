@if(Auth()->id() != $user->id)
    <button  class="btn @if(canIFollowThisUser($user) == -1) btn-outline-info followAction @else btn-outline-danger unfollowAction @endif " data-user_id="{{$user->id}}" data-friends_id="@if(canIFollowThisUser($user) != -1) {{canIFollowThisUser($user)}} @endif" >
        @if(canIFollowThisUser($user) == -1)FOLLOW @else UNFOLLOW @endif
    </button>
@endif
