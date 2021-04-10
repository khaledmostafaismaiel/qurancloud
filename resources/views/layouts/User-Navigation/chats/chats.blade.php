<span class="nav-link">
    <i class="fas fa-comment"></i>
    <span class="badge badge-pill badge-info">@if(1) 0 @endif</span>
</span>
<div class="notifi-box" id="chats-box">
    <h2 class="notifi-box-h2">Chats<span class="notifi-box-span">{{auth()->user()->chats()->count()}}</span></h2>
    <table id="chats-box-table">
        @foreach(auth()->user()->chats() as $chat)
            @include('layouts.User-Navigation.chats.chat-body')
        @endforeach
    </table>
    <span class="chats">
        <button class="btn w-100 btn-info">
            See All chats
        </button>
    </span>
</div>
