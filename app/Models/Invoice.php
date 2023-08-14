<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function Group(){
        return $this->belongsTo(Group::class,'Group_id','id');
    }
    public function Section(){
        return $this->belongsTo(Section::class,'section_id','id');
    }
    public function Doctor(){
        return $this->belongsTo(Doctor::class,'doctor_id','id');
    }
    public function Patient(){
        return $this->belongsTo(Patient::class,'patient_id','id');
    }
    public function Service(){
        return $this->belongsTo(Service::class,'Service_id','id');
    }
}
