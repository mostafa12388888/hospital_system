<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Comment\Doc;
use PhpParser\Node\Stmt\Do_;

class Ray extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function doctor(){
        return $this->belongsTo(Doctor::class,'patient_id');
    }
    public function RayEmploy(){
        return $this->belongsTo(RayEmployee::class,'employee_id');
    }
    public function Patient(){
        return $this->belongsTo(Patient::class,'patient_id');
    }
    public function Service(){
        return $this->belongsTo(Service::class,'patient_id');
    }
    public function images(){
        return $this->morphMany(Image::class,'imagable');
    }
}
