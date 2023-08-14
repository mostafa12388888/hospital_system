<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientAccount extends Model
{
    use HasFactory;
    // protected $guarded 
    protected $table='patient_accounts';
    protected $guarded =[];
    public function PaymentAccount(){
        return $this->belongsTo(PaymentAcount::class,'Payment_id');
    }
    public function Invoice(){
        return $this->belongsTo(Invoice::class,'invoice_id');
    }
    public function ReceiptAccount(){
        return $this->belongsTo(ReciptAcout::class,'recipt_id');
    }
}
