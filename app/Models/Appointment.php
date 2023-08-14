<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory,Translatable;
    protected $fillable=['name'];
    public $translatedAttributes=['name'];
    public function doctors(){
        return $this->hasMany(Doctor::class,'appointment__dectors');
    }
}
