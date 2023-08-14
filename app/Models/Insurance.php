<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    use HasFactory,Translatable;
   public $fillable=['status','company_rate','discount_percentage','insurance_code','notes','name'];
   public $translatedAttributes=['name','notes'];
}
