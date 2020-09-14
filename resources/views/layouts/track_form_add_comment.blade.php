<form method="POST" action="/comments" class="track-form-comment" id="add_comment-{{$track->id}}">
    {{csrf_field()}}

    <div class="track-form-comment">
        <table>
            <tr>
                <td>
                    <a href="/users/{{auth()->id()}}">
                        <img src="/storage/uploads/profile_pictures/{{auth()->user()->profile_picture}}" alt="User photo" class="track-comment-photo">
                    </a>
                </td>
                <td  class="track-comment-user_name"><a class="track-comment-user_name-link" href="/users/{{auth()->user()->id}}">{{auth()->user()->full_name()}}</a></td>

                <td>&nbsp;</td>
                <td><input hidden type="text" name="track_id" value="{{$track->id}}" required></td>

            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><textarea name="comment" cols="500" rows="1" required class="track-comment-text_area" placeholder="Write something constractive"></textarea></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit"  class="btn btn-primary" name="submit" value="Commnet"></td>
            </tr>
        </table>
    </div>
</form>
