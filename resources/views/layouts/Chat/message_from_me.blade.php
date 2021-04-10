<div class="chat-page-message-section-square-from_me bg-success text-white">
    <p>
        {{$message->body}}
    </p>
    <p class="chat-page-message-section-square-date-from_me">
        {{date("jS F Y", strtotime($message->created_at->toDateTimeString()))}}
    </p>

</div>
