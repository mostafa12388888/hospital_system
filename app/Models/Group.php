<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory,Translatable;
    protected $fillable=['notes','name','total_with_tax','tax_rate','total_after_discount','discount_value','total_before_descount'];
    public $translatedAttributes=['name','notes'];
    public function service_group(){
        return $this->belongsToMany(Service::class,'service_groupes','group_id','service_id')->withPivot('quantity');
    }
}
