<div class="card h-100 border-bottom-0 border-info track-comment bg-dark">
    <div class="card-body">
        <form method="POST" action="/comments" class="add_comment" id="add_comment-{{$track->id}}" data-id="{{$track->id}}">
            {{csrf_field()}}

            <div class="">
                <table>
                    <tr>
                        <td>
                            <a href="/users/{{auth()->id()}}">
                                <img src="/storage/uploads/profile_pictures/{{auth()->user()->profile_picture}}" alt="User photo" class="track-comment-photo">
                            </a>
                        </td>
                        <td  class=""><a class="track-track_owner-name" href="/users/{{auth()->user()->id}}">{{auth()->user()->full_name()}}</a></td>

                        <td>&nbsp;</td>
                        <td><input hidden type="text" name="track_id" value="{{$track->id}}" required></td>

                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><textarea name="comment"  id="comment-{{$track->id}}" cols="500" rows="1" required class="w-100 h-auto p-2" placeholder="Write something constractive"></textarea></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><input type="submit"  class="btn btn-primary" name="submit" value="Commnet"></td>
                    </tr>
                </table>
            </div>
        </form>

    </div>
</div>
