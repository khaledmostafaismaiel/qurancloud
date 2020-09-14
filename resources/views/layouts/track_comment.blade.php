<div class="track-comment" id="track_comment-{{$comment->id}}">
    <table>
        <tr>
            <td><a href="/users/{{App\User::findorfail($comment->user_id)->id}}"><img src="/storage/uploads/profile_pictures/{{App\User::findorfail($comment->user_id)->profile_picture}}" alt="User photo" class="track-comment-photo"></a></td>
            <td  class="track-comment-user_name"><a class="track-comment-user_name-link" href="/users/{{$comment->user_id}}">{{App\User::findorfail($comment->user_id)->full_name()}}</a></td>
            <td>
                @include('layouts.track_comment-dropdown_menu')
            </td>

            <td><input hidden type="text" name="user_id" value="{{$comment->user_id}}" required></td>
        </tr>
        <tr>
            <td>
                @if(canILoveThisComment($comment) == -1)
                    <img src="/images/unlove.png"  class="track-comment-love_pic">
                    <form method="POST" action="/commentLoves" class="track-comment-love">
                        {{csrf_field()}}
                        <input hidden type="text" name="comment_id" value="{{$comment->id}}" required>
                        {{--                <img src="/images/set.png" alt="User photo" class="user-nav__user-photo">--}}
                        <input type="submit"  class="btn btn-danger" name="submit" value="Love">
                    </form>
                @else
                    <img src="/images/love.png" class="track-comment-love_pic">
                    <form method="POST" action="/commentLoves/{{canILoveThisComment($comment)}}" class="">
                        {{csrf_field()}}
                        {{method_field('delete')}}
                        {{--                <img src="/images/set.png" alt="User photo" class="user-nav__user-photo">--}}
                        <input type="submit"  class="btn btn-warning" name="submit" value="unLove">
                    </form>
                @endif
            </td>
            @if($comment == $comment_to_edit)
                <td>
                    <form method="post" action="/comments/{{$comment->id}}">
                        {{csrf_field()}}
                        {{method_field('patch')}}
                        <textarea name="comment"  cols="500" rows="1" class="track-comment-text_area">{{$comment->comment}}</textarea>
                        <input type="submit" value="Edit" class="">
                    </form>
                </td>
                @if(auth()->id() == $comment->user_id)
                    <td>&nbsp;</td>
                @endif
            @else
                <td><textarea name="comment"  cols="500" rows="1" readonly class="track-comment-text_area">{{$comment->comment}}</textarea></td>
                @if(auth()->id() == $comment->user_id)
                    <td>&nbsp;</td>
                @endif
            @endif
        </tr>
        <tr>
            <td>
                @include('layouts.track_comment_loves_modal')
            </td>
                {{--            <td><a class="track-comment-love" href="/commentLoves?comment_id={{$comment->id}}">{{$comment->commentLoves()->count()}} Love</a></td>--}}
            @if(auth()->id() == $comment->user_id)
                <td>&nbsp;</td>
            @endif
        </tr>
    </table>
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
