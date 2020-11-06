<form method="POST" action="/friends/{{canIFollowThisUser($user)}}" class="">
    {{csrf_field()}}
    {{method_field('DELETE')}}
    <input type="submit"  class="btn btn-outline-danger " name="submit" value="UNFOLLOW">
</form>
