{{--@extends('layouts.master_layout')--}}
{{--@section('content')--}}
{{--    <div  class="table-loves-container flex-container-column-wrap">--}}
{{--            @foreach($loves as $love)--}}
{{--                <div class="table-loves-record">--}}
{{--                        <span class="flex-container-column-wrap">--}}
{{--                            <a href="/users/{{$love->user_id}}">--}}
{{--                                <img src="/storage/uploads/profile_pictures/{{$profile_pic = App\User::findorfail($love->user_id)->profile_picture}}" alt="User photo" class="track-comment-photo">--}}
{{--                            </a>--}}
{{--                            <a href="/users/{{App\User::findorfail($love->user_id)->id}}" class="flex-item-row-wrap table-loves-record-user_name">--}}
{{--                                {{App\User::findorfail($love->user_id)->full_name()}}--}}
{{--                            </a>--}}
{{--                        </span>--}}
{{--                        <span class="table-loves-record-created_at">{{date("Y-m-d h:i:sa",strtotime($love->created_at))}}</span>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--    </div>--}}
{{--@endsection--}}

{{dd("you are in love.blade.php")}}
