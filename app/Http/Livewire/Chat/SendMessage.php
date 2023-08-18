<?php

namespace App\Http\Livewire\Chat;

use App\Events\MessageSentChat;
use App\Events\MessageSentChat2;
use App\Models\Conversation;
use App\Models\Doctor;
use App\Models\Mesage;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SendMessage extends Component
{

    protected $listeners=['updateMessage','updateMessage2','dispatiSendMessageChat'];
    public $receviverUser,$selected_conversation,$sender,$body,$auth_email,$createMessages;
    public function mount(){
        // $this->auth_email=auth()->user()->email;
    if(Auth::guard('Patient')->check()){
        $this->auth_email=Auth::guard('Patient')->user()->email;
$this->sender=Auth::guard('Patient')->user();

    }else{
        $this->auth_email=Auth::guard('doctor')->user()->email;
        $this->sender=Auth::guard('doctor')->user();
    }
    }
 public function updateMessage(Conversation $conversation,Doctor $receiver){
// dd(21);
    $this->selected_conversation=$conversation;
    $this->receviverUser= $receiver;
 }
 public function updateMessage2(Conversation $conversation,Patient $receiver){
// dd(3);
$this->selected_conversation=$conversation;
    $this->receviverUser= $receiver;
 }
    public function sendMessage(){
        if($this->body==null)
            return null;
            $this->createMessages=Mesage::create([
                'reciver_email'=> $this->receviverUser->email,
                'sender_email'=> $this->auth_email,
                'conversation_id'=>$this->selected_conversation->id,
                'body'=>$this->body,
                ]);
$this->selected_conversation->last_time_message=$this->createMessages->created_at;
$this->selected_conversation->save();
$this->reset('body');
$this->emitTo('chat.chatbox','PushMessage',$this->createMessages->id);
$this->emitTo('chat.chat-list','refresh');
$this->emitSelf('dispatiSendMessageChat');
    }
    public function dispatiSendMessageChat(){
// dd($this->sender);
if(Auth::guard('Patient')->check()){
        broadcast(new MessageSentChat($this->createMessages, $this->selected_conversation,$this->sender,$this->receviverUser));
}else{
    broadcast(new MessageSentChat2($this->createMessages, $this->selected_conversation,$this->sender,$this->receviverUser));
}
}
    public function render()
    {
        return view('livewire.chat.send-message')->extends('Dashbord.layouts.master');
    }
}
