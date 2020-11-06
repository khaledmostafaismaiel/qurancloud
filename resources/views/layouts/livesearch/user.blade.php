<tr>
    <td><img src="/storage/uploads/profile_pictures/{{App\User::findorfail($user->id)->profile_picture}}" alt="" class="user-nav__user-photo">{{App\User::findorfail($user->id)->full_name()}}</td>
    <td><a class="btn btn-success" href="/users/{{App\User::findorfail($user->id)->id}}">View</a></td>
    <td></td>
</tr>
