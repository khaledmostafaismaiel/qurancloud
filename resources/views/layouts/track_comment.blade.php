<div class="card h-100 border-bottom-0 border-info track-comment">
    <div class="card-body">
        <table>
            <tr>
                <td><a href="/users/{{App\User::findorfail($comment->user_id)->id}}"><img src="/storage/uploads/profile_pictures/{{App\User::findorfail($comment->user_id)->profile_picture}}" alt="User photo" class="track-comment-photo"></a></td>
                <td><a  href="/users/{{$comment->user_id}}" class="track-track_owner-name">{{App\User::findorfail($comment->user_id)->full_name()}}</a></td>
                <td>
                    @include('layouts.track_comment-dropdown_menu')
                </td>

                <td><input hidden type="text" name="user_id" value="{{$comment->user_id}}" required></td>
            </tr>
            <tr>
                <td>
                    @if(canILoveThisComment($comment) == -1)
                        <img src="/images/unlove.png"  class="track-comment-love_photo" data-track_comment_id="{{$comment->id}}">
                        <form method="POST" action="/commentLoves" class="">
                            {{csrf_field()}}
                            <input hidden type="text" name="comment_id" value="{{$comment->id}}" required>
                            <input type="submit"  class="btn btn-danger" name="submit" value="Love">
                        </form>
                    @else
                        <img src="/images/love.png" class="track-comment-unlove_photo" data-track_comment_id="{{$comment->id}}">
                        <form method="POST" action="/commentLoves/{{canILoveThisComment($comment)}}" class="">
                            {{csrf_field()}}
                            {{method_field('delete')}}
                            <input type="submit"  class="btn btn-warning" name="submit" value="unLove">
                        </form>
                    @endif
                </td>
                @if(isset($comment_to_edit) && ($comment->id == $comment_to_edit->id))
                    <td>
                        <form method="post" action="/comments/{{$comment->id}}">
                            {{csrf_field()}}
                            {{method_field('patch')}}
                            <textarea name="comment"  cols="500" rows="1" class="w-100 h-auto p-2">{{$comment->comment}}</textarea>
                            <input type="submit" value="Edit" class="btn btn-info">
                        </form>
                    </td>
                @else
                    <td><textarea name="comment"  cols="500" rows="1" readonly class=" w-100 h-auto p-2">{{$comment->comment}}</textarea></td>

                @endif
                <td>

                </td>
            </tr>
            <tr>
                <td>
                    @include('layouts.track_comment_loves_modal')
                </td>
                <td>

                </td>
            </tr>
        </table>
    </div>
</div>



<!-- Track Comment Report Modal -->
<div class="modal fade" id="comment-report-{{$comment->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="comment-report-Label-{{$comment->id}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="comment-report-Label-{{$comment->id}}">Report {{App\User::findorfail($comment->user_id)->full_name()}} Comment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <form action="/tracks/report/{{$comment->id}}" method="post">
                    {{csrf_field()}}
                    <div class="form-check">
                        <input type="radio" name="reason" value="1" class="form-check-input mt-3" id="spam-{{$comment->id}}">
                        <label  class="form-check-label mt-3" for="spam-{{$comment->id}}">Spam</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="reason" value="2" class="form-check-input mt-3" id="nudity-{{$comment->id}}">
                        <label  class="form-check-label mt-3" for="nudity-{{$comment->id}}">Nudity</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="reason" value="3" class="form-check-input mt-3" id="other-{{$comment->id}}">
                        <label class="form-check-label mt-3" for="other-{{$comment->id}}">other</label>
                    </div>
                    <input type="submit" value="report" class="btn btn-warning w-100 mt-3">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!-- Delete Track Comment Modal -->
<div class="modal fade" id="delete_track_comment-{{$comment->id}}" tabindex="-1" aria-labelledby="delete_track_comment-Label-{{$comment->id}}" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete_track_comment-Label-{{$comment->id}}">Delete Comment ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                You can edit this comment if you just need to change something.
            </div>
            <div class="modal-footer">
                <form method="post" action="/comments/{{$comment->id}}">
                    {{csrf_field()}}
                    {{method_field('delete')}}
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
