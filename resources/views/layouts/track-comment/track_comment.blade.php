<div class="card h-100 border-bottom-0 border-info track-comment bg-dark" @if(! isset($addTrackComment)) id="track_comment-{{$comment->id}}" @endif>
    <div class="card-body">
        <table @if(isset($addTrackComment))  data-track_id="{{$track->id}}" @else data-comment_id="{{$comment->id}}" @endif>
            <tr>
                <td>
                    <img src="@if(isset($addTrackComment))/storage/uploads/profile_pictures/{{auth()->user()->profile_picture}} @else/storage/uploads/profile_pictures/{{App\User::findorfail($comment->user_id)->profile_picture}} @endif" alt="User photo" class="track-comment-photo"  data-user-id="@if(isset($addTrackComment)){{auth()->id()}}@else{{App\User::findorfail($comment->user_id)->id}}@endif">
                </td>
                @if(isset($addTrackComment))
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                @else
                    <td>
                        <span class="track-track_owner-name text-white" data-user-id="{{$comment->user_id}}">
                            {{App\User::findorfail($comment->user_id)->full_name()}}
                        </span>
                    </td>
                    <td>
                        @include('layouts.track-comment.track_comment-dropdown_menu')
                    </td>
                @endif
            </tr>

            <tr>
                @if(! isset($addTrackComment))
                    <td>
                        <img src="@if(canILoveThisComment($comment) == -1) /images/unlove.png @else /images/love.png @endif"  class="@if(canILoveThisComment($comment) == -1) track-comment-love_photo @else track-comment-unlove_photo @endif" data-track_comment_id="{{$comment->id}}" data-track_comment_love_id="@if(canILoveThisComment($comment)) {{canILoveThisComment($comment)}} @endif" >
                    </td>
                @endif
                <td class="w-100">
                    <input name=@if(isset($addTrackComment)) add_comment @else edit_comment @endif" class="w-100 h-auto p-2 @if(isset($addTrackComment)) text-dark bg-white border @else text-white bg-dark border-0 @endif"  @if(isset($addTrackComment)) placeholder="Let's write somethig constractive !" @else value="{{$comment->comment}}" @endif   @if(! isset($addTrackComment)) readonly @endif>
                </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                @if(! isset($addTrackComment))
                    <td>
                        @include('layouts.track-comment.track_comment_loves_modal')
                    </td>
                @endif
                <td>
                    <button class="btn btn-primary @if(isset($addTrackComment))  add_comment @else d-none submit_edit_comment @endif">Comment</button>
                </td>
                <td>&nbsp;</td>
            </tr>
        </table>
    </div>
</div>

@if(! isset($addTrackComment))
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
                        <button type="submit" name="delete" class="btn btn-danger delete-track_comment-submit" data-id="{{$comment->id}}" data-dismiss="modal">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif


