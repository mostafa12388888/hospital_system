<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Doctor extends Authenticatable
{
    use HasFactory,Translatable;
    protected $table='doctors';
    // protected $guarded =[];
    protected $fillable=['name','section_id','status','email','phone','password','email_veryfired_at'];
    public $translatedAttributes=['name'];

    public function image(){
        return $this->morphOne(Image::class,'imagable');
    }
    public function section(){
        return $this->belongsTo(Section::class,'section_id','id');
    }
    public function appointments(){
        return $this->belongsToMany(Appointment::class,'appointment__dector','docutor_id','appointment_id');
    }
}
