<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dignostic extends Model
{
    use HasFactory;
    protected $fillable=['doctor_id','patient_id','invoice_id','medicine','diagnosis','date','date'];
public function Doctor(){
    return $this->belongsTo(Doctor::class,'doctor_id');
}
}
