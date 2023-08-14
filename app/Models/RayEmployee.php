<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class RayEmployee extends Authenticatable
{
    protected $table='ray_employees';
    use HasFactory;
    protected $fillable=['email','password','email_verified_at','name'];
}
