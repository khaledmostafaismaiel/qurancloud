{{--@extends('layouts.master_layout')--}}
{{--@section('content')--}}
{{--    @include('layouts.track_form_add_track')--}}
{{--    @foreach($tracks as $track)--}}
{{--        @include('layouts/track')--}}
{{--        <div id="track-comments-container-{{$track->id}}" data-track-comments-container-id="{{$track->id}}" class="track-comments-container flex-container-column-wrap" >--}}
{{--            @include('layouts.track_form_add_comment')--}}

{{--            @if(($track->comments != null) && ($comment = $track->Last_comment()))--}}
{{--                @include('layouts.track_comment')--}}
{{--            @endif--}}
{{--        </div>--}}
{{--    @endforeach--}}
{{--    <div class="master_view-show_more" id="master_view-show_more-tracks">--}}
{{--        <button type="button" id="master_view-show_more-button-tracks-index" class="btn btn-success btn-block " in side the class disabled data-last_id="{{$lastId}}">--}}
{{--            Show More--}}
{{--        </button>--}}
{{--    </div>--}}
{{--@endsection--}}

@extends('layouts.master_layout')
@section('content')
    <div class="row row-cols-lg-4 row-cols-md-3  row-cols-sm-2 row-cols-1 " >
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
