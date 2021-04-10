<div class="d-flex row flex-nowrap chat-page">
    @if(isset($with_side_nav) && $chats)
        @include('layouts.Chat.side_nav_chats')
    @endif

    @include('layouts.Chat.message_section')
</div>
