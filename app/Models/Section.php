<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Astrotomic\Translatable\Contracts\Translatable ;
use Astrotomic\Translatable\Translatable;

class Section extends Model
{
    use HasFactory,Translatable;
    protected $fillable = ['name','description'];
    public $translatedAttributes = ['name','description'];
    public function docutors(){
        return $this->hasMany(Doctor::class,'section_id');
    }
}
