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
    // $conversations=[];
    protected $listeners=['refresh'=>'$refresh','chatUserSelected'];
    public function mount(){
        $this->auth_email=auth()->user()->email;
        // $this->conversations[]=Conversation::where('sender_email',$this->auth_email)->orWhere('reciver_email',$this->auth_email)
        // ->orderBy('created_at', 'DESC')
        // ->get();
    }

    public function getUsers(Conversation $Conversation, string $request)
    {
// dd($Conversation->get($request));
//if i doctor if i sender
// if i doctor i reciver


if(Doctor::whereEmail($this->auth_email)->get()->isNotEmpty())
    if($Conversation->sender_email==$this->auth_email){
        $this->receviverUser=Patient::firstwhere('email',$Conversation->reciver_email);
    }else{
        $this->receviverUser=Patient::firstwhere('email',$Conversation->sender_email);
    }
else{
    if($Conversation->sender_email==$this->auth_email){
        $this->receviverUser=Doctor::firstwhere('email',$Conversation->reciver_email);
    }else{

        $this->receviverUser=Doctor::firstwhere('email',$Conversation->sender_email);
    }}

    // return $this->receviverUser->email;
// dd( $this->receviverUser->translations[0]->name);
// dd($this->receviverUser->email);
// $this->receviverUser->get($request);
if($request=="name"){
return  $this->receviverUser->translations[0]->name;
}
else if($request=="id"){
    return $this->receviverUser->id
;}
// return  $this->receviverUser->email;
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
