@extends('layouts.master_layout')
@section('content')
    <div  class="table-loves-container flex-container-column-wrap">
        @foreach($followings as $following)
            <div class="table-loves-record">
                <span class="flex-container-column-wrap">
                    <a href="/users/{{$following->following_user_id}}">
                        <img src="/storage/uploads/profile_pictures/{{App\User::findorfail($following->following_user_id)->profile_picture}}" alt="User photo" class="track-comment-photo">
                    </a>
                    <a href="/users/{{$following->following_user_id}}" class="flex-item-row-wrap table-loves-record-user_name">
                        {{App\User::findorfail($following->following_user_id)->full_name()}}
                    </a>
                </span>
            </div>
        @endforeach
    </div>
    <div class="master_view-pagination">
        {{$followings->onEachSide(1)->links()}}
    </div>
@endsection

