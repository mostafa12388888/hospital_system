<?php

namespace App\Models;

use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment_Dector extends Model
{
    use HasFactory;
    protected $fillable=['docutor_id','appointment_id'];
    public $timestamps=false;
}
