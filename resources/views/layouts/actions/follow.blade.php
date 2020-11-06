<form method="POST" action="/friends" class="">
    {{csrf_field()}}
    <input type="text" hidden name="following_user_id" value="{{$user->id}}">
    <input type="submit"  class="btn btn-outline-info " name="submit" value="FOLLOW">
</form>
