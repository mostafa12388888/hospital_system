<?php
namespace App\Repositery\doctor_dashbord;

use App\Interfaces\doctor_dashbord\LaboratoryRepostoryInterface;
use App\Models\Laboratory;

class LaboratoryRepostory implements LaboratoryRepostoryInterface{
    public function store($request){
    
$lab=new Laboratory();
$lab->doctor_id=$request->doctor_id;
$lab->patient_id=$request->patient_id;
$lab->description=$request->description;
$lab->invoice_id=$request->invoice_id;
$lab->save();
session()->flash('add');
return redirect()->back();
    }
  
    public function update($request,$id){
        $lab=Laboratory::findOrfail($id);

$lab->description=$request->description;
$lab->save();
session()->flash('edit');
return redirect()->back();
    }
    public function destroy($request){
        $lab=Laboratory::destroy($request->id);
        session()->flash('delete');
return redirect()->back();
    }
    public function show($id){
        $laboratories=Laboratory::findOrFail($id);
        
        return view('Dashbord.Doctors.invoices.view_laboratories',compact('laboratories'));
    }
}