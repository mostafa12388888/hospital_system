<?php 
namespace App\Repositery\patient;

use App\Interfaces\patient\patiantIntRepostoryerface;
use App\Models\Invoice;
use App\Models\Patient;
use App\Models\PatientAccount;
use App\Models\ReciptAcout;
use App\Models\single_invoice;
use Illuminate\Support\Facades\Hash;

class patiantIntRepostory implements patiantIntRepostoryerface{
    public function index(){
$Patients=Patient::all();
return view('Dashbord.Patient.index',compact('Patients'));


    }
    public function create(){
        return view('Dashbord.Patient.create');
    }
    public function store($request){
try{
    Patient::create([
        'name'=>$request->name,
        'email'=>$request->input('email'),
        'Gender'=>$request->Gender,
        'phone'=>$request->Phone,
        'Date_Birth'=>$request->Date_Birth,
        'password'=>Hash::make($request->password),
        'Address'=>$request->input('Address'),
        'Blood_Group'=>$request->Blood_Group,
    ]);
    session()->flash('add');
    return redirect()->route('Patients.index');

}catch(\Exception $e){
    return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
}
    }
    public function edit($id){
       $Patient= Patient::findOrFail($id);
       return view('Dashbord.Patient.edit',compact('Patient'));
    }
    public function show($id){
       $Patient= Patient::findOrFail($id);
       $invoices=Invoice::where('Patient_id',$id)->get();
       $receipt_accounts=ReciptAcout::where('patiant_id',$id)->get();
       $Patient_accounts=PatientAccount::where('patient_id',$id)->get();
       
       return view('Dashbord.Patient.show',compact('Patient','invoices','receipt_accounts','Patient_accounts'));
    }
    public function update($request){
        Patient::findOrFail($request->id)->Update([
            'name'=>$request->name,
            'email'=>$request->input('email'),
            'Gender'=>$request->Gender,
            'phone'=>$request->Phone,
            'Date_Birth'=>$request->Date_Birth,
            'password'=>Hash::make($request->password),
            'Address'=>$request->input('Address'),
            'Blood_Group'=>$request->Blood_Group,
        ]);
        session()->flash('upadate');
return redirect()->route('Patients.index');
    }
    public function destroy($request){
Patient::destroy($request->id);
session()->flash('Delete');
return redirect()->route('Patients.index');
    }
}