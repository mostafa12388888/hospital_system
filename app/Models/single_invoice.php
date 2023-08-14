<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class single_invoice extends Model
{
    use HasFactory;
    protected $fillable=['type','total_with_tax','tax_value','tax_rate','discout_Value','price','price','Service_id','section_id','doctor_id','Patient_id',
'invoice_date','invoice_date','services','sections','doctors','patients'];
public function Section(){
    return $this->belongsTo(Section::class,'section_id','id');
}
public function Doctor(){
    return $this->belongsTo(Doctor::class,'doctor_id','id');
}
public function Patient(){
    return $this->belongsTo(Patient::class,'Patient_id','id');
}
public function Service(){
    return $this->belongsTo(Service::class,'Service_id','id');
}
}
