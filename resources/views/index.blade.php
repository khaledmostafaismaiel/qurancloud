@extends('layouts.master_layout')
@section('content')
    <div class="row row-cols-lg-4 row-cols-md-3  row-cols-sm-2 row-cols-1 " id="tracks_container" >
        @foreach($tracks as $track)
            @include('layouts.track')
        @endforeach
    </div>

    <div class="master_view-show_more" id="master_view-show_more">
        <button type="button" id="master_view-show_more-button-tracks-index" class="btn btn-success "  data-last_id="{{$lastId}}">
            Show More
        </button>
    </div>
@endsection
