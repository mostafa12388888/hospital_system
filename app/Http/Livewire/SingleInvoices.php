<?php

namespace App\Http\Livewire;

use App\Events\CreateInvoice;
use App\Events\CreateInvoices;
use App\Events\MyEvet;
use App\Models\Doctor;
use App\Models\FundAccount;
use App\Models\Invoice;
use App\Models\Notification;
use App\Models\Patient;
use App\Models\PatientAccount;
use App\Models\Service;
use App\Models\single_invoice;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SingleInvoices extends Component
{
    public  $username,$InvoicesSaved,$InvoicesUpdated,$showTable=true,$updateMode=false,$catchError,
    $Service_id,$patient_id,$doctor_id,$section_id,$price,$discount_value,$tax_rate,$type,$single_invoice_id=-1;
  public function mount(){
$this->username=Auth::user()->name;
// $this->patientName=Patient::where('id',$this->patient_id)->first()->name;
  }
    public function render()
    {
        return view('livewire.single-invoices',[
            'single_invoices'=>Invoice::where('invoice_type',1)->get(),
            'Services'=>Service::all(),
            'Patients'=>Patient::all(),
            'Doctors'=>Doctor::all(),
            'subtotal'=>$totoalAfterDiscount=(is_numeric($this->price)?$this->price:0)-(is_numeric($this->discount_value)?$this->discount_value:0),
            'tax_value'=>$totoalAfterDiscount*((is_numeric($this->tax_rate)?$this->tax_rate:0)/100),
        ]);

    }
    public function get_section(){
        $this->section_id=Doctor::where('id',$this->doctor_id)->first()->section->name;
    }
    public function get_price()
    {
        $this->price = Service::where('id', $this->Service_id)->first()->price;
    }

    public function show_form_add(){
        $this-> showTable=false;
    }
    public function store(){
        try{
            DB::beginTransaction();
        // stor in invoices table
        $taxt_value=($this->price -$this->discount_value) * ((is_numeric($this->tax_rate) ? $this->tax_rate : 0) / 100);
        $total=$this->price - $this->discount_value + $taxt_value;
        $patientName=Patient::where('id',$this->patient_id)->first()->name;
        //   dd($patientName);
        if($this->updateMode){
           Invoice::findOrFail($this->single_invoice_id)->update([
            'invoice_status'=>1,
            'type'=>$this->type,
           
            'invoice_type'=>1,
            'tax_rate'=>$this->tax_rate,
            'discount_value'=>$this->discount_value|0,
            'price'=>$this->price,
            'section_id'=>DB::table('section_translations')->where('name',$this->section_id)->first()->section_Id,
            'doctor_id'=>$this->doctor_id,
            'patient_id'=>$this->patient_id,
            'invoice_date'=>date('Y-m-d'),
            'Service_id'=>$this->Service_id,
            'tax_value'=> $taxt_value,
            'total_with_tax'=> $total,
            ]);
            if($this->type==1){
                $fundAcout=FundAccount::where('invoice_id',$this->single_invoice_id)->first();
               
                $fundAcout->Credit=0.00;
                $fundAcout->Depit= $total;
                $fundAcout->date=date('Y-m-d');
                $fundAcout->save();
               
            }else{
                $patientAcount=PatientAccount::where('invoice_id',$this->single_invoice_id)->first();;
                $patientAcount->date=date("Y-m-d");
                $patientAcount->Patient_id=$this->patient_id;
                $patientAcount->Debit=$total;
                $patientAcount->Credit=0.00;
                $patientAcount->save();
            }
        }else{
         
        $lastId=  Invoice::insertGetId([
            'invoice_status'=>1,
            'type'=>$this->type,
           
            'invoice_type'=>1,
            'tax_rate'=>$this->tax_rate,
            'discount_value'=>$this->discount_value|0,
            'price'=>$this->price,
            'section_id'=>DB::table('section_translations')->where('name',$this->section_id)->first()->section_Id,
            'doctor_id'=>$this->doctor_id,
            'patient_id'=>$this->patient_id,
            'invoice_date'=>date('Y-m-d'),
            'Service_id'=>$this->Service_id,
            'tax_value'=> $taxt_value,
            'total_with_tax'=> $total,
    ]);
        if($this->type==1){
        
    // store in Fund_acount table
    $fundAcout=new FundAccount();
    $fundAcout->Credit=0.00;
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
    //    $not=new Notification();
    //    $not->username=$this->username;
    //    $not->message='كشف جديد'.$patientName;
    //    $not->save();
    $patientName=Patient::findOrFail($this->patient_id)->name;
    $usernamed=Auth::user()->id;
        Notification::create([
            'user_id'=> $usernamed,
            'message'=>'كشف جديد'.$patientName,
        ]);
        // dd($this->patient_id);
        $data=[
            'patient_id'=>$this->patient_id,
            'invoice_id'=>$lastId,
            'doctor_id'=>$this->doctor_id,
        ];
        event(new CreateInvoice($data));
    }
   
   
    DB::commit();
    }catch(\Exception $e){
        DB::rollBack();
        return $this->catchError=$e->getMessage();
    }
    $this->reset();
    $this->showTable=true;
    $this->InvoicesSaved=true;
    $this->updateMode=false;
        }
   public function edit($id){
    $this->updateMode=true;
    $this-> showTable=false;
    $this->single_invoice_id=$id;
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
//    public function update($id){
//     single_invoice::findOrFail($id)->update([
//         'type'=>$this->type,
   
//         'tax_rate'=>$this->tax_rate,
//         'discout_Value'=>$this->discount_value|0,
//         'price'=>$this->price,
//         'section_id'=>DB::table('section_translations')->where('name',$this->section_id)->first()->section_Id,
//         'doctor_id'=>$this->doctor_id,
//         'Patient_id'=>$this->patient_id,
//         'invoice_date'=>date('Y-m-d'),
//         'Service_id'=>$this->Service_id,
//         'tax_value'=>$taxt_value=($this->price -$this->discount_value) * ((is_numeric($this->tax_rate) ? $this->tax_rate : 0) / 100),
//         'total_with_tax'=>$this->price - $this->discount_value + $taxt_value,
//     ]);

//     }
    public function delete($id){
        $this->single_invoice_id=$id;
    }
    public function destroy(){
      Invoice::destroy( $this->single_invoice_id);
       $this->single_invoice_id=-1;
       return redirect()->to('/single_invoices');
    }
    public function print($id){
       $print_single_invoice=Invoice::findOrFail($id);
       return redirect()->route('print_single_invoices',[
        'invoice_date' => $print_single_invoice->invoice_date,
        'doctor_id' => $print_single_invoice->Doctor->name,
        'section_id' => $print_single_invoice->Section->name,
        'Service_id' => $print_single_invoice->Service->name,
        'type' => $print_single_invoice->type,
        'price' => $print_single_invoice->price,
        'discount_value' => $print_single_invoice->discout_Value,
        'tax_rate' => $print_single_invoice->tax_rate,
        'total_with_tax' => $print_single_invoice->total_with_tax,
       ]);
    }
}
