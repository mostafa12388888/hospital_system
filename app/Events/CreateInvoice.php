<?php

namespace App\Events;

use App\Models\Patient;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CreateInvoice implements ShouldBroadcast
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
    public function broadcastOn():Channel
    {
        return new PrivateChannel('createInvoice.'.$this->doctor_id);
        //return ['createInvoice'];
    }

    public function broadcastAs()
    {
        return 'createInvoice';
    }

}
