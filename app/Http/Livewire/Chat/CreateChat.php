<?php

namespace App\Http\Livewire\Chat;

use App\Models\Conversation;
use App\Models\Doctor;
use App\Models\Mesage;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;


class CreateChat extends Component
{
    public $users,$auth_id,$catchError;
    public $conversations;
    public function mount(){

        $this->auth_id=auth()->user()->email;
        $this->conversations=Conversation::where('sender_email', $this->auth_id)->orWhere('reciver_email', $this->auth_id)
        ->orderBy('created_at', 'DESC')
        ->get();
    }
    public function createConversation($receiver_email){

        $conversation=Conversation::Conversation( $this->auth_id,$receiver_email)->get();

        if($conversation->isEmpty()){

            DB::beginTransaction();
            try{

                $createconversations=Conversation::create([
                    'sender_email'=> $this->auth_id,
                    'reciver_email'=>$receiver_email,
                ]);

                Mesage::create([
                    'conversation_id'=>$createconversations->id,
                    'sender_email'=>$this->auth_id,
                    'reciver_email'=>$receiver_email,
                    'body'=>'ألسلام عليكم',
                ]);
DB::commit();

            } catch (\Exception $e) {
                DB::rollBack();
            } }

            if(Doctor::whereEmail($this->auth_id)->get()->isNotEmpty())
                return redirect()->to('doctor/chat/patient');
            return redirect()->to('Patient/chat/doctor');

    }
    public function render()
    {

        if(Auth::guard('Patient')->check())
        $this->users=Doctor::all();
        else
        $this->users=Patient::all();


        return view('livewire.chat.create-chat')->extends('Dashbord.layouts.master');
    }


}
