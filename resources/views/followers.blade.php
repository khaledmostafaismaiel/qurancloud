@extends('layouts.master_layout')
@section('content')
    <div  class="table-loves-container flex-container-column-wrap">
        @foreach($followers as $follower)
            <div class="table-loves-record">
                <span class="flex-container-column-wrap">
                    <a href="/users/{{$follower->follower_user_id}}">
                        <img src="/storage/uploads/profile_pictures/{{App\User::findorfail($follower->follower_user_id)->profile_picture}}" alt="User photo" class="track-comment-photo">
                    </a>
                    <a href="/users/{{$follower->follower_user_id}}" class="flex-item-row-wrap table-loves-record-user_name">
                        {{App\User::findorfail($follower->follower_user_id)->full_name()}}
                    </a>
                </span>
            </div>
        @endforeach
    </div>
    <div class="master_view-pagination">
        {{$followers->onEachSide(1)->links()}}
    </div>
@endsection

