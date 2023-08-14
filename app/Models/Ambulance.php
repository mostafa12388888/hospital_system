<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ambulance extends Model
{
    use HasFactory,Translatable;
protected $fillable=['car_type','is_available','driver_phone','driver_licence_number','car_year_made','car_model','car_number','notes','driver_name'];
public $translatedAttributes=['notes','driver_name'];
}
