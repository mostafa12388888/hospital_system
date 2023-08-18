<?php

namespace App\Events;

use App\Models\Conversation;
use App\Models\Doctor;
use App\Models\Mesage;
use App\Models\Patient;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSentChat2 implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $Message,$reciver,$conversation,$sender;
    /**
     * Create a new event instance.
     */
    public function __construct(Mesage $Message,Conversation $conversation,Doctor $sender,Patient $reciver)
    {
        // dd(2);
        $this->Message=$Message;
        $this->reciver=$reciver;
        $this->conversation=$conversation;
        $this->sender=$sender;
        // dd( $this->reciver->id);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastWith(){
        return [
            'conversation_id'=> $this->conversation->id,
            'sender_email'=>$this->sender->email,
            'reciver_email'=>$this->reciver->email,
            'message'=> $this->Message->id,
        ];
    }
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('chatAbouteUs2.'.$this->reciver->id),
        ];
    }
}
