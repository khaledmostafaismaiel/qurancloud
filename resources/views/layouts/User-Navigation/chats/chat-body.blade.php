<div class="notifi-item @if($chat->lastMessage()->is_read == 0) bg-info @else bg-white @endif  text-dark chat" data-chat_id="{{$chat->id}}" data-from_notifications="1">
    <img class="notifi-item-img" src="@if($chat->from_user_id == auth()->id()) /storage/uploads/profile_pictures/{{\App\User::find($chat->to_user_id)->profile_picture}}@else /storage/uploads/profile_pictures/{{\App\User::find($chat->from_user_id)->profile_picture}}  @endif">
    <div class="notifi-item-text">
        <h4 class="notifi-item-text-h4">@if($chat->from_user_id == auth()->id()) {{\App\User::find($chat->to_user_id)->full_name()}}@else {{\App\User::find($chat->from_user_id)->full_name()}}  @endif </h4>
{{--        <p class="text-dark font-weight-lighter notifi-box-message-body">{{$chat->lastMessage()->body}}</p>--}}
    </div>
</div>
