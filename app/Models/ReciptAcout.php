<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReciptAcout extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function patients(){
        return $this->belongsTo(Patient::class,'patiant_id','id');
    }
}
