<sidbar class="chat-page-sidebar bg-white">
    <div class="chat-page-sidebar-my-info pb-3">
        <div class="flex-nowrap d-flex">
            <span class="d-flex justify-content-start flex-nowrap">
                <img src="/storage/uploads/profile_pictures/{{auth()->user()->profile_picture}}" alt="User photo" class="track-comment-photo ml-5 mr-5 mt-3 mb-3">
            </span>
            <span class="w-100 d-flex justify-content-end flex-nowrap mr-3 mt-4">
                <span class="">
                    <button class="btn" type="button">
                        <i class="far fa-circle"></i>
                    </button>
                </span>
                <span class="">
                    <button class="btn" type="button">
                        <i class="far fa-comment-dots"></i>
                    </button>
                </span>
                <span class="">
                    <i class="fas fa-ellipsis-v btn nav-link" id="chat-page-sidebar-my-info_dropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ></i>
                    <span class="dropdown-menu dropdown-menu-right" aria-labelledby="chat-page-sidebar-my-info_dropdown">
                        <button class="dropdown-item btn w-100">
                            <span>New group</span>
                        </button>
                        <button class="dropdown-item btn w-100">
                            <span>Create room</span>
                        </button>
                        <button class="dropdown-item btn w-100">
                            <span>Profile</span>
                        </button>
                        <button class="dropdown-item btn w-100">
                            <span>Archived</span>
                        </button>
                        <button class="dropdown-item btn w-100">
                            <span>Starred</span>
                        </button>
                        <button class="dropdown-item btn w-100">
                            <span>Settings</span>
                        </button>
                    </span>
                </span>
            </span>
        </div>
        <div class="input-group flex-nowrap mr-5 ml-5">
            <button type="button" class="btn rounded-left rounded-left">
                <i class="fas fa-search"></i>
            </button>
            <div class="form-outline w-75">
                <input type="search" id="chat-page-sidebar-search" class="form-control rounded-right" placeholder="Search or start new chat" />
            </div>
        </div>
    </div>
    <nav class="chat-page-sidebar-chats" {{--TO SEE ONLINE USERS UNCOMMENT id="online-users"--}}  id="online-users">
        @foreach($chats as $chat)
            <li data-chat_id="{{$chat->id}}" from_notifications="" class="chat chat-page-sidebar-chats-item d-flex flex-nowrap @if($chat->id == $chat_id) selected_chat @endif">
                <div class="m-4">
                    @if($chat->lastMessage()->from_user_id != auth()->id())
                        <img src="/storage/uploads/profile_pictures/{{\App\User::findorfail($chat->lastMessage()->from_user_id)->profile_picture}}" alt="User photo" class="chat-page-sidebar-chats-item-user-photo">
                        <span class="text-dark font-weight-bolder">{{ \App\User::findorfail($chat->lastMessage()->from_user_id)->full_name() }}</span>
                    @else
                        <img src="/storage/uploads/profile_pictures/{{\App\User::findorfail($chat->lastMessage()->to_user_id)->profile_picture}}" alt="User photo" class="chat-page-sidebar-chats-item-user-photo">
                        <span class="text-dark font-weight-bolder">{{ \App\User::findorfail($chat->lastMessage()->to_user_id)->full_name() }}</span>
                    @endif
                    <span class="text-dark message-section-square-date">{{date("jS F Y", strtotime($chat->lastMessage()->created_at->toDateTimeString()))}}</span>
                    <div class="text-dark">{{$chat->lastMessage()->body}}</div>
                </div>
            </li>
        @endforeach
    </nav>
</sidbar>
