@extends('layouts.master_layout')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="user-id" content="{{ auth()->id() ? auth()->id() : '' }}">

    @if($chats)
        <nav class="messages-sidebar">
            <ul class="messages-side-nav">
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

@endsection
