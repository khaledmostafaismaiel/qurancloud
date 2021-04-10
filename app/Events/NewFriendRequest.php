<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewFriendRequest
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $from;
    public $to;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($from,$to)
    {
        $this->from = $from;
        $this->to = $to;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('friend-request');
    }

    public function broadcastAs()
    {
        return 'new-friend-request';
    }
}
