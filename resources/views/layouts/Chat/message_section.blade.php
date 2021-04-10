<div class="chat-page-message-section flex-container-column-no_wrap">
    <div class="d-flex chat-page-message-section-reciver_info border-left border-dark">
        <div class="d-flex justify-content-start w-100">
            <img src="/storage/uploads/profile_pictures/{{\App\User::findorfail($to_user_id)->profile_picture}}" alt="User photo" class="track-comment-photo ml-5 mr-5 mt-3 mb-3">
            <span class="font-weight-bolder mt-5">{{\App\User::findorfail($to_user_id)->full_name()}}</span>
        </div>
        <div class="d-flex justify-content-end mr-4 mt-4" >
            <span class="">
                <button type="button" class="btn rounded-left rounded-left">
                    <i class="fas fa-search"></i>
                </button>
            </span>
            <span class="">
                <i class="fas fa-ellipsis-v btn nav-link" id="chat-page-sidebar-my-info_dropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ></i>
                <span class="dropdown-menu dropdown-menu-right" aria-labelledby="chat-page-sidebar-my-info_dropdown">
                    <button class="dropdown-item btn w-100">
                        <span>Contact info</span>
                    </button>
                    <button class="dropdown-item btn w-100">
                        <span>Select Messages</span>
                    </button>
                    <button class="dropdown-item btn w-100">
                        <span>Mute notifications</span>
                    </button>
                    <button class="dropdown-item btn w-100">
                        <span>Clear messages</span>
                    </button>
                    <button class="dropdown-item btn w-100">
                        <span>Delete chat</span>
                    </button>
                </span>
            </span>
        </div>
    </div>
    <div class="chat-page-message-section-square" id="chat">
        @forelse($messages as $message)
            @if($message->from_user_id == auth()->id())
                @include('layouts.Chat.message_from_me')
            @else
                @include('layouts.Chat.message_to_me')
            @endif
        @empty
            <div class="">
                <p>
                    Start new chat
                </p>
            </div>
        @endforelse
    </div>
    <div class="chat-page-message-section-menu_bar">
{{--        <button class="btn btn-light p-3 h-100 w-auto">--}}
{{--            <i class="fas fa-paperclip"></i>--}}
{{--        </button>--}}
        <textarea value="" rows="4" name="body" class="chat-page-message-section-menu_bar-text" data-to_user_id="{{$to_user_id}}"  data-chat_id="{{$message->chat_id}}"></textarea>
        <button class="chat-page-message-section-menu_bar-send btn btn-outline-success" data-to_user_id="{{$to_user_id}}" data-chat_id="{{$message->chat_id}}">
            <i class="fas fa-paper-plane"></i>
        </button>
    </div>
</div>
