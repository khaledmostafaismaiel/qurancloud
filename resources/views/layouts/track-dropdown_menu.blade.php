<div class="dropdown">
    <button class="btn btn-outline-info dropdown-toggle" type="button" id="dropDownMenuButton-{{$track->id}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    </button>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropDownMenuButton-{{$track->id}}">
        @if(auth()->id() == $track->user_id)
            <span class="dropdown-item">
                @if($track->id == $track_id_to_edit)
                    <form action="/tracks/{{$track->id}}" method="post">
                        {{csrf_field()}}
                        {{method_field('patch')}}
                        <input type="submit" value="EDIT" class="btn btn-info w-100">
                    </form>
                @else
                    <a href="/tracks/{{$track->id}}/edit" class="btn btn-info w-100">Edit</a>
                @endif
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
