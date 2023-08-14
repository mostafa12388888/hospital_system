<?php

namespace App\Http\Livewire\GroupInvoices;

use App\Models\Doctor;
use App\Models\FundAccount;
use App\Models\Group;
use App\Models\GroupInvoice;
use App\Models\Invoice;
use App\Models\Patient;
use App\Models\PatientAccount;
use App\Models\Section;
use App\Models\Service;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class GroupInvoices extends Component
{
    public $InvoiceSaved,$InvoiceUpdated,$patient_id,$doctor_id,$type,$Group_id,$Service_id,$group_invoice_id,
    $show_table=true,$section_id,$updateMode=false,$tax_rate ,$price,$discount_value,$CatchError;
    public function render()
    {
        return view('livewire.group-invoices.group-invoices',[
            'Patients'=>Patient::all(),
            'Doctors'=>Doctor::all(),
            'Groups'=>Group::all(),
            'group_invoices'=> Invoice::where('invoice_type',2)->get(),
            'subtotal'=>$totoalAfterDiscount=(is_numeric($this->price)?$this->price:0)-(is_numeric($this->discount_value)?$this->discount_value:0),
            'tax_value'=>$totoalAfterDiscount*((is_numeric($this->tax_rate)?$this->tax_rate:0)/100),
        ]);
    }
    public function show_form_add(){
        $this->show_table=false;
    }
    public function get_section(){
        $this->section_id=Doctor::where('id',$this->doctor_id)->first()->section->name;
    }
    public function get_price(){
        $this->price=Group::findOrFail($this->Group_id)->total_before_descount;
        $this->discount_value=Group::findOrFail($this->Group_id)->discount_value;
        $this->tax_rate=Group::findOrFail($this->Group_id)->tax_rate;
    }
    public function store(){
        
        try{
            DB::beginTransaction();
        // stor in invoices table
        $taxt_value=($this->price -$this->discount_value) * ((is_numeric($this->tax_rate) ? $this->tax_rate : 0) / 100);
        $total=$this->price - $this->discount_value + $taxt_value;
    
if($this->updateMode){
    
    Invoice::findOrFail( $this->group_invoice_id)->update([
               
                'type'=>$this->type,
               
                'invoice_type'=>2,
                'tax_rate'=>$this->tax_rate,
                'discount_value'=>$this->discount_value|0,
                'price'=>$this->price,
                'section_id'=>DB::table('section_translations')->where('name',$this->section_id)->first()->section_Id,
                'doctor_id'=>$this->doctor_id,
                'patient_id'=>$this->patient_id,
                'invoice_date'=>date('Y-m-d'),
                
                'tax_value'=> $taxt_value,
                'total_with_tax'=> $total,
                
               
               
                
                'Group_id'=>$this->Group_id,
                
            ]);
            // dd('f');
            if($this->type==1){
                $fundAcout=FundAccount::where('invoice_id',$this->group_invoice_id)->first();
                $fundAcout->Credit=0.00;
                $fundAcout->Depit= $total;
                $fundAcout->date=date('Y-m-d');
                $fundAcout->save();
    
            }else{
                $patientAcount=PatientAccount::where('invoice_id',$this->group_invoice_id)->first();;
                // dd($patientAcount);
                $patientAcount->date=date('Y-m-d');
                $patientAcount->Patient_id=$this->patient_id;
                $patientAcount->Debit=$total;
                $patientAcount->Credit=0.00;
                $patientAcount->save();
            }
        }else{
            // dd($this->Service_id);
            $lastId=  Invoice::insertGetId([
                'type'=>$this->type,
               
                'invoice_type'=>2,
                'tax_rate'=>$this->tax_rate,
                'discount_value'=>$this->discount_value|0,
                'price'=>$this->price,
                'section_id'=>DB::table('section_translations')->where('name',$this->section_id)->first()->section_Id,
                'doctor_id'=>$this->doctor_id,
                'patient_id'=>$this->patient_id,
                'invoice_date'=>date('Y-m-d'),
                
                'tax_value'=> $taxt_value,
                'total_with_tax'=> $total,
                'Group_id'=>$this->Group_id,
    ]);
    // 
        if($this->type==1){
            // dd(40);
    // store in Fund_acount table
    $fundAcout=new FundAccount();
    $fundAcout->Credit=0.00;
    $fundAcout->Depit= $total;
    $fundAcout->Depit= $total;
    $fundAcout->invoice_id= $lastId;
    $fundAcout->date=date('Y-m-d');
    $fundAcout->save();
    
        }else{
            // store in invoices_patient Table
            $patientAcount=new PatientAccount();
            $patientAcount->date=date("Y-m-d");
            $patientAcount->invoice_id=$lastId;
            $patientAcount->Patient_id=$this->patient_id;
            $patientAcount->Debit=$total;
            $patientAcount->Credit=0.00;
            $patientAcount->save();
        }
    }
    DB::commit();
    }catch(\Exception $e){
        DB::rollBack();
        $this->CatchError=$e->getMessage();
    }
    $this->show_table=true;
    $this->InvoiceSaved=true;
    $this->updateMode=false;
        }
        public function edit($id){
            $this->updateMode=true;
            $this-> show_table=false;
            $this->group_invoice_id=$id;
            $single_invoice=Invoice::findOrFail($id);
            $this->Service_id= $single_invoice->Service_id;
            $this->patient_id= $single_invoice->Patient_id;
            $this->doctor_id= $single_invoice->doctor_id;
            $this->section_id = DB::table('section_translations')->where('section_Id',$single_invoice->section_id)->first()->name;
            $this->price= $single_invoice->price;
            $this->discount_value= $single_invoice->discout_Value;
            $this->tax_rate= $single_invoice->tax_rate;
            $this->type= $single_invoice->type;
           }
           public function delete($id){
            $this->group_invoice_id=$id;
           }
           public function destroy(){
           Invoice::destroy( $this->group_invoice_id);
            $this->group_invoice_id=-9;
            return redirect()->to('group_invoices');
           }
           public function print($id)
    {
        $single_invoice = Invoice::findorfail($id);
        return Redirect::route('group_Print_single_invoices',[
            'invoice_date' => $single_invoice->invoice_date,
            'doctor_id' => $single_invoice->Doctor->name,
            'section_id' => $single_invoice->Section->name,
            'Group_id' => $single_invoice->Group->name,
            'type' => $single_invoice->type,
            'price' => $single_invoice->price,
            'discount_value' => $single_invoice->discount_value,
            'tax_rate' => $single_invoice->tax_rate,
            'total_with_tax' => $single_invoice->total_with_tax,
        ]);

    }
}
