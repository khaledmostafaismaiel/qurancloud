<div class="dropdown">
    <button class="btn btn-outline-info dropdown-toggle" type="button" id="dropDownMenuButton-{{$comment->id}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    </button>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropDownMenuButton-{{$comment->id}}">
        @if(auth()->id() == $comment->user_id)
            <button class="dropdown-item">
                    <span class="edit-track-comment btn btn-info w-100" >Edit</span>
            </button>
            <div class="dropdown-divider"></div>
            <span class="dropdown-item">
                @include('layouts.actions.delete_track_comment_modal')
            </span>
        @else
            <span class="dropdown-item" id="track-menu-wrapper-item-report-{{$comment->id}}">
                @include('layouts.actions.track_comment_report_modal')
            </span>
        @endif

    </div>
</div>
