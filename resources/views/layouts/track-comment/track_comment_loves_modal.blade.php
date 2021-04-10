<!-- Button trigger modal -->
<button type="button" class="track_comment_loves_modal_btn btn btn-danger" data-toggle="modal" data-target="#comment-loves-{{$comment->id}}" data-comment_id="{{$comment->id}}">
    <span id="track_comment_loves-{{$comment->id}}">{{$comment->commentLoves()->count()}}</span><span> Love</span>
</button>
<!-- Modal -->
<div class="modal fade" id="comment-loves-{{$comment->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="comment-loves-Label-{{$comment->id}}" aria-hidden="true" data-comment_id="{{$comment->id}}">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="comment-loves-Label-{{$comment->id}}">{{$comment->commentLoves()->count()}} Loves</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center modal-body-track-comment-loves">
                <table class="modal-body-track-comment-loves-table" id="modal-body-track-comment-loves-table_{{$comment->id}}">

                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
