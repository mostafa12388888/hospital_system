<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupInvoice extends Model
{
    use HasFactory;
    protected $fillable=['type','total_with_tax','tax_value','tax_rate','discout_Value','price','price','Service_id','section_id','doctor_id','Patient_id',
    'invoice_date','invoice_date','Group_id','sections','doctors','patients'];
    // protected $guarded=[];
    public function Group(){
        return $this->belongsTo(Group::class,'Group_id','id');
    }
    public function Section(){
        return $this->belongsTo(Section::class,'section_id','id');
    }
    public function Doctor(){
        return $this->belongsTo(Doctor::class,'doctor_id','id');
    }
    public function Patient(){
        return $this->belongsTo(Patient::class,'Patient_id','id');
    }
    
}
