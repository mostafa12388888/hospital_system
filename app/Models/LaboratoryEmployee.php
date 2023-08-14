<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class LaboratoryEmployee extends Authenticatable
{
    use HasFactory;
    protected $fillable=['email','password','email_verified_at','name'];
}
