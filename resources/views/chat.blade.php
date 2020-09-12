@extends('layouts.master_layout')
@section('content')
    <meta name="user-id" content="{{ auth()->id() ? auth()->id() : '' }}">
    <meta name="user-profile_pic" content="{{ auth()->user()->profile_picture ? auth()->user()->profile_picture : ''}}">
    <meta name="to_user_id" content="{{ $to_user_id }}">
    <meta name="chat_id" content="{{ $chat_id }}">

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
            @foreach($messages as $message)
                @if($message->from_user_id == auth()->id())
                    <div class="message-section-square-from_me">
                        <spam class="message-section-square-from_me-profile_pic">
                            <img src="/storage/uploads/profile_pictures/{{auth()->user()->profile_picture}}" alt="User photo" class="chat-side-nav__item__user-photo">
                        </spam>
                        {{$message->body}}
                    </div>
                @else
                    <div class="message-section-square-to_me">
                        <spam class="message-section-square-to_me-profile_pic">
                            <img src="/storage/uploads/profile_pictures/{{\App\User::findorfail($message->from_user_id)->profile_picture}}" alt="User photo" class="chat-side-nav__item__user-photo">
                        </spam>
                        {{$message->body}}
                    </div>
                @endif
            @endforeach
        </div>
        <div class="message-section-menu_bar">
            <form method="post" action="/messages" class="flex-container-row-no_wrap">
                {{csrf_field()}}
                <input type="text" name="to_user_id" value="{{$to_user_id}}" hidden>
                <input type="text" name="chat_id" value="{{$chat_id}}" hidden>
                <textarea rows="2" name="body" class="message-section-menu_bar-text" required id="chat-text"></textarea>
                <input type="submit" value="send" class="message-section-menu_bar-send">
            </form>
        </div>
    </div>
</div>
@endsection
