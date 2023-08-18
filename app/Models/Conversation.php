<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function scopeConversation($query,$auth_email,$reciverEmail){
        return $query->where('sender_email',$auth_email)->where('reciver_email',$reciverEmail)->OrWhere('reciver_email',$auth_email)->where('sender_email',$reciverEmail);
    }
    public function messages(){
        return $this->hasMany(Mesage::class,'conversation_id');
    }
}
