<?php

namespace App\Events;

use App\Models\Notification;
use App\Models\Patient;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MyEvet implements ShouldBroadcast
{
  

    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public  $invoice_id,$patientName,$creat_at,$message,$doctor_id;
    public function __construct($deta)
    {
       
        $patients=Patient::findOrFail($deta['patient_id']);
        // dd($patients);
        $this->invoice_id=$deta['invoice_id'];
        $this->patientName=$patients->name;
        $this->creat_at=date('Y-m-d-H-m-s');
        $this->message='كشف جديد';
        $this->doctor_id=$deta['doctor_id'];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn()
    {
        dd(2);
        return new PrivateChannel('my-event.'.$this->doctor_id);
        // return ['my-event'];
    }
    public function broadcastAs()
  {
    dd(2);
      return 'my-event';
  }
}
