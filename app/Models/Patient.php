<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Patient extends Authenticatable
{
    use HasFactory,Translatable;
   protected $fillable=['name','email','Address','Blood_Group','Gender','phone','Date_Birth','password'];
   public $translatedAttributes=['name','Address'];
}
