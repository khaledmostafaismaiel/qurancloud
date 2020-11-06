<tr class="col">
    <td class="col-auto">
        <img src="/storage/uploads/profile_pictures/{{\App\User::findorfail($following->following_user_id)->profile_picture}}" alt="User photo" class="user-nav__user-photo mb-4">
        {{\App\User::findorfail($following->following_user_id)->full_name()}}
    </td>
    <td class="col-auto"><a class="btn btn-success" href="/users/{{$following->following_user_id}}">View</a></td>
</tr>
