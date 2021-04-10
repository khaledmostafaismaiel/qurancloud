<div class="chat-page-message-section-square-to_me bg-white text-dark">
    <p>
        {{$message->body}}
    </p>
    <span class="chat-page-message-section-square-date-to_me">
        {{date("jS F Y", strtotime($message->created_at->toDateTimeString()))}}
    </span>

</div>
