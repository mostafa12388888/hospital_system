<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsuranceTranslation extends Model
{
    use HasFactory;
    protected  $fillable=['notes','name'];
public $timestamps=false;
}
