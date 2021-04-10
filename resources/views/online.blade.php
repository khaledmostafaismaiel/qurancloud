@extends('layouts.master_layout')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="user-id" content="{{ auth()->id() ? auth()->id() : '' }}">


    <nav class="chat-sidebar">
        <ul class="chat-side-nav" id="online-users">
            @for($i=0;$i<1;++$i)
                <li class="chat-side-nav__item /*chat-side-nav__item--active*/">
                    <a href="/messages/1" class="chat-side-nav__link">
                        <img src="/storage/uploads/profile_pictures/{{auth()->user()->profile_picture}}" alt="User photo" class="user-nav__user-photo">
                        <span>Gmail</span>
                    </a>
                </li>

            @endfor
        </ul>
    </nav>
@endsection
