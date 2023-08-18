<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appotment2 extends Model
{
    use HasFactory;
    protected $fillable=['name','doctor_id','section_id','email','phone','type','notes','appointment'];


    public function doctor(){
        return $this->belongsTo(Doctor::class,'doctor_id');
    }
    public function section(){
        return $this->belongsTo(Section::class,'section_id');
    }

}
