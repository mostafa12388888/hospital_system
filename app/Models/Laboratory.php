<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Builder\Function_;
use PhpParser\Node\Expr\FuncCall;

class Laboratory extends Model
{
    use HasFactory;
    protected $guarded=[];
public Function doctor(){
    return $this->belongsTo(DoctorTranslation::class,'doctor_id');
}
public Function Patient(){
    return $this->belongsTo(PatientTranslation::class,'patient_id');
}
public Function employee(){
    return $this->belongsTo(LaboratoryEmployee::class,'employee_id');
}
public function images(){
    return $this->morphMany(Image::class,'imagable');
}
}
