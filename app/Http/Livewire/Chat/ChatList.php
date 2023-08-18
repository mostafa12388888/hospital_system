<?php

namespace App\Http\Livewire\Chat;

use App\Models\Conversation;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ChatList extends Component
{
    public $auth_email,$receviverUser,$selected_conversation,$name;
    protected $listeners=['refresh'=>'$refresh'];
    public function mount(){
        $this->auth_email=auth()->user()->email;
    }

    public function getUsers(Conversation $Conversation,$request){
// dd($Conversation->get($request));
if($Conversation->sender_email==$this->auth_email){

    $this->receviverUser=Doctor::firstwhere('email',$Conversation->reciver_email);
}else{

    $this->receviverUser=Patient::firstwhere('email',$Conversation->sender_email);
}

// dd($request);
// dd($this->receviverUser->id);
// $this->receviverUser->get($request);
if($request=="name"){
return $this->receviverUser->name;
}
else if($request=="id"){
return $this->receviverUser->id;}
    }
    public function chatUserSelected(Conversation $Conversation,$recive_id) {
// dd($Conversation);
$this->selected_conversation=$Conversation;

if(Auth::guard('Patient')->check()){
// dd(2);
$this->receviverUser=Doctor::find($recive_id);

$this->emitTo('chat.send-message','updateMessage',$this->selected_conversation, $this->receviverUser);
    $this->emitTo('chat.chatbox','load_conversationPatient',$this->selected_conversation, $this->receviverUser);
}else{
// dd(5);
// dd($this->selected_conversation);
$this->receviverUser=Patient::find($recive_id);
    $this->emitTo('chat.chatbox','load_conversationDoctors',$this->selected_conversation, $this->receviverUser);
    $this->emitTo('chat.send-message', 'updateMessage2', $this->selected_conversation, $this->receviverUser);
}
// dd(5);


}
    public function render()
    {
        //    ['conversations'=>Conversation::where('sender_email',$this->auth_email)->orderBy('created_at','DESC')->get()]
        // $this->conversations=Conversation::where('sender_email',$this->auth_email)->orWhere('reciver_email',$this->auth_email)
        // ->orderBy('created_at', 'DESC')
        // ->get();
        // dd(Conversation::where('sender_email',$this->auth_email)->orWhere('reciver_email',$this->auth_email)
        // ->orderBy('created_at', 'DESC')
        // ->get());
        return view('livewire.chat.chat-list',
          ['conversations'=>Conversation::where('sender_email',$this->auth_email)->orWhere('reciver_email',$this->auth_email)
          ->orderBy('created_at', 'DESC')
          ->get()])->extends('Dashbord.layouts.master');
    }
}
