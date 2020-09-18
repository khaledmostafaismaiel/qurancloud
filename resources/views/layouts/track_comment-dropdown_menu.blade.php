<div class="dropdown">
    <button class="btn btn-outline-info dropdown-toggle" type="button" id="dropDownMenuButton-{{$comment->id}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    </button>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropDownMenuButton-{{$comment->id}}">
        @if(auth()->id() == $comment->user_id)
            <span class="dropdown-item">
                    <a href="/comments/{{$comment->id}}/edit" class="btn btn-info w-100" >Edit</a>
            </span>
            <div class="dropdown-divider"></div>
            <span class="dropdown-item">
                @include('layouts.delete_track_comment_modal')
            </span>
        @else
            <span class="dropdown-item" id="track-menu-wrapper-item-report-{{$comment->id}}">
                @include('layouts.track_comment_report_modal')
            </span>
        @endif

    </div>
</div>
