<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#comment-loves-{{$comment->id}}">
    <span>{{$comment->commentLoves()->count()}}</span><span>Love</span>
</button>
<!-- Modal -->
<div class="modal fade" id="comment-loves-{{$comment->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="comment-loves-Label-{{$comment->id}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="comment-loves-Label-{{$comment->id}}">{{$comment->commentLoves()->count()}} Loves</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                @foreach($comment->commentLoves as $love)
                    <div class="col mb-5">
                        <div class="">
                            <a href="/users/{{$love->user_id}}">
                                <img src="/storage/uploads/profile_pictures/{{$profile_pic = App\User::findorfail($love->user_id)->profile_picture}}" alt="User photo" class="track-comment-photo">
                            </a>
                        </div>
                        <div class="">
                            <a href="/users/{{App\User::findorfail($love->user_id)->id}}" class="">
                                {{App\User::findorfail($love->user_id)->full_name()}}
                            </a>
                        </div>
                        <div class="">
                            <span class="text-dark">{{date("Y-m-d h:i:sa",strtotime($love->created_at))}}</span>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="modal-footer">
                <button type="button" id="comment-loves-popup" class="btn btn-success btn-block" data-last_id="" data-user_id="">Show More</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
