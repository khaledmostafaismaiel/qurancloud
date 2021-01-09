@extends('layouts.master_layout')
@section('content')
    @include('layouts.profile_navigation')
    <div class="profile_script row row-cols-lg-4 row-cols-md-3  row-cols-sm-2 row-cols-1 " id="tracks_container" data-user_id="{{$user->id}}">

    </div>
@endsection

