<div class="dropdown">
    <button class="btn btn-outline-info dropdown-toggle" type="button" id="dropDownMenuButton-{{$track->id}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    </button>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropDownMenuButton-{{$track->id}}">
        @if(auth()->id() == $track->user_id)
            <span class="dropdown-item">
                <a href="/tracks/{{$track->id}}/edit" class="btn btn-info w-100">Edit</a>
            </span>
            <div class="dropdown-divider"></div>
            <span class="dropdown-item">
                @include('layouts.delete_track_modal')
            </span>
        @else
            @include('layouts.track_report_modal')
        @endif
    </div>
</div>
