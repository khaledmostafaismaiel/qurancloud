@if($chats)
    <nav class="messages-sidebar">
        <ul class="messages-side-nav">
            @foreach($chats as $chat)
                <li class="chat-page-sidebar-chats-item">
                    <a href="/chats/{{$chat->id}}" class="chat-side-nav__link">
                        @if($chat->lastMessage()->from_user_id != auth()->id())
                            <img src="/storage/uploads/profile_pictures/{{\App\User::findorfail($chat->lastMessage()->from_user_id)->profile_picture}}" alt="User photo" class="m-3 track-comment-photo">
                            <span>{{ \App\User::findorfail($chat->lastMessage()->from_user_id)->full_name() }}</span>
                        @else
                            <img src="/storage/uploads/profile_pictures/{{\App\User::findorfail($chat->lastMessage()->to_user_id)->profile_picture}}" alt="User photo" class="m-3 track-comment-photo">
                            <span>{{ \App\User::findorfail($chat->lastMessage()->to_user_id)->full_name() }}</span>
                        @endif
                    </a>
                </li>
            @endforeach
        </ul>
    </nav>
@endif
