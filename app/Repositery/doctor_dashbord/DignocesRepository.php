<?php
namespace App\Repositery\doctor_dashbord;
use App\Interfaces\doctor_dashbord\DignocesRepositoryInterface;
use App\Models\Dignostic;
use App\Models\Invoice;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Catch_;

class DignocesRepository implements DignocesRepositoryInterface {
   
    public function index(){}
    public function create(){}
    public function store($request){
        try{

            Invoice::findOrfail($request->invoice_id)->update(['invoice_status'=>2]);
        Dignostic::create([
            'doctor_id'=>$request->doctor_id,
            'patient_id'=>$request->patient_id,
            'invoice_id'=>$request->invoice_id,
            'medicine'=>$request->medicine,
            'diagnosis'=>$request->diagnosis,
            'date'=>date('Y-m-d'),
            
        ]);
        session()->flash('add');
        return redirect()->route('invoices.index');
    }catch(\Exception $e){
        return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
    }
    }
    public function edit($id){}
    public function show($id){
        $patient_records =  Dignostic::where('patient_id',$id)->get();
        return view('Dashbord.Doctors.invoices.patient_record',compact('patient_records'));
    }
    public function add_review($request){
        DB::beginTransaction();
        try{
        Invoice::findOrfail($request->invoice_id)->update(['invoice_status'=>3]);
        Dignostic::create([
            'doctor_id'=>$request->doctor_id,
            'patient_id'=>$request->patient_id,
            'invoice_id'=>$request->invoice_id,
            'medicine'=>$request->medicine,
            'diagnosis'=>$request->diagnosis,
            'date'=>date('Y-m-d'),
            'review_date'=>date('Y-m-d H:i:s'),
            
        ]);
        DB::commit();
        return redirect()->route('invoices.index');
    }Catch(\Exception $e){
        DB::rollBack();
        return redirect()->back()->withErrors(['Error'=>$e]);

    }
    }
    public function update($request){}
    public function destroy($request){}
}