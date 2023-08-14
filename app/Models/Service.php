<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory,Translatable;
   protected $fillable=['name','id','status','price','description'];
   public $translatedAttributes=['name'];
   public function service_group(){
    return $this->hasMany(Group::class,'service_groupes','service_id','group_id');
}
}
