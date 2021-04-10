<div class="dropdown" data-track_id="{{$track->id}}">
    <button class="btn btn-outline-info dropdown-toggle" type="button" id="dropDownMenuButton-{{$track->id}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    </button>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropDownMenuButton-{{$track->id}}">
        @if(auth()->id() == $track->user_id)
            <button class="dropdown-item">
                <span class="edit-track btn btn-info w-100" >Edit</span>
            </button>
            <div class="dropdown-divider"></div>
            <span class="dropdown-item">
                @include('layouts.actions.delete_track_modal')
            </span>
        @else
            @include('layouts.actions.track_report_modal')
        @endif
    </div>
</div>

