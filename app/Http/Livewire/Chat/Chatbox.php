<?php

namespace App\Http\Livewire\Chat;
use Livewire\Component;
// use App\Models\Message;
use App\Models\Conversation;
use App\Models\Doctor;
use App\Models\Mesage;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;


class Chatbox extends Component
{
    // protected $listeners =['load_conversationDoctors','load_conversationPatient','PushMessage'];
    public $selected_conversation,$messages,$authed_Id,$receviverUser,$auth_email,$chat_page,$event_name;
    public function mount(){

        $this->auth_email =auth()->user()->email;
    }

    public function load_conversationDoctors(Conversation $conversation,Patient $receiver){
        // dd(788888888);
        $this->selected_conversation=$conversation;
        $this->receviverUser=$receiver;
        // dd($this->selected_conversation->id);
        $this->messages=Mesage::where('conversation_id',$conversation->id)->get();
    }
    public function PushMessage($message_id){
        $this->messages->push(Mesage::Find($message_id));
    }
    public function load_conversationPatient(Conversation $conversation,Doctor $receiver){
        // dd(788888888);
        $this->selected_conversation=$conversation;
        $this->receviverUser=$receiver;
        $this->messages=Mesage::where('conversation_id',$conversation->id)->get();
    }
    public function getListeners(){
        if(Auth::guard('Patient')->check()){
            $authed_Id=Auth::guard('Patient')->user()->id;
            $this->event_name="MessageSentChat2";
            $this->chat_page="chatAbouteUs2";

                    }else{
                        $authed_Id=Auth::guard('doctor')->user()->id;
                        $this->event_name="MessageSentChat";
                        $this->chat_page="chatAbouteUs";
                    }

                    return [
                        "echo-private:$this->chat_page.{$authed_Id},$this->event_name"=>'broadCastMessages','load_conversationDoctors','load_conversationPatient','PushMessage',
                ];
}
    public function broadCastMessages($event){
        $borodcastMessage=Mesage::find($event['message']);
        $borodcastMessage->read=1;
       $this->PushMessage($borodcastMessage->id);
    }
    public function render()
    {
        return view('livewire.chat.chatbox')->extends('Dashbord.layouts.master');
    }
}
