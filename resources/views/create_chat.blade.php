@extends('layouts.master_layout')
@section('content')
    <meta name="user-id" content="{{ auth()->id() ? auth()->id() : '' }}">
    <meta name="user-profile_pic" content="{{ auth()->user()->profile_picture ? auth()->user()->profile_picture : ''}}">
    <meta name="to_user_id" content="{{ $to_user_id }}">

    <div class="flex-container-row-no_wrap-no_space">
    @if($chats)
        <nav class="chat-sidebar"{{--TO SEE ONLINE USERS UNCOMMENT id="online-users"--}}>
            <ul class="chat-side-nav">
                @foreach($chats as $chat)
                    <li class="chat-side-nav__item /*chat-side-nav__item--active*/">
                        <a href="/chats/{{$chat->id}}" class="chat-side-nav__link">
                            @if($chat->lastMessage()->from_user_id != auth()->id())
                                <img src="/storage/uploads/profile_pictures/{{\App\User::findorfail($chat->lastMessage()->from_user_id)->profile_picture}}" alt="User photo" class="chat-side-nav__item__user-photo">
                                <span>{{ \App\User::findorfail($chat->lastMessage()->from_user_id)->full_name() }}</span>
                            @else
                                <img src="/storage/uploads/profile_pictures/{{\App\User::findorfail($chat->lastMessage()->to_user_id)->profile_picture}}" alt="User photo" class="chat-side-nav__item__user-photo">
                                <span>{{ \App\User::findorfail($chat->lastMessage()->to_user_id)->full_name() }}</span>
                            @endif
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>
    @endif
    <div class="message-section flex-container-column-no_wrap">
        <div class="message-section-square" id="chat">

        </div>
        <div class="message-section-menu_bar">
            <form method="post" action="/chats/store/for_first_time" class="flex-container-row-no_wrap">
                {{csrf_field()}}
                <input type="text" name="to_user_id" value="{{$to_user_id}}" hidden>
                <textarea rows="2" name="body" class="message-section-menu_bar-text" required id="chat-text-for_first_time"></textarea>
                <input type="submit" value="send" class="message-section-menu_bar-send">
            </form>
        </div>
    </div>
</div>
@endsection
