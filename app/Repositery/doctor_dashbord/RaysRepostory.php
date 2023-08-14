<?php
namespace App\Repositery\doctor_dashbord;
use App\Interfaces\doctor_dashbord\RaysRepostoryInterFace;
use App\Models\Ray;

class RaysRepostory implements RaysRepostoryInterFace{
    public function index(){}
    public function create(){}
    public function store($request){
        try{
        $ray=new Ray();
        $ray->description=$request->description;
        $ray->doctor_id=$request->doctor_id;
        $ray->patient_id=$request->patient_id;
        $ray->invoice_id=$request->invoice_id;
        $ray->save();
        session()->flash('add');
        return redirect()->route('invoices.index');
    }catch(\Exception $e){
        return redirect()->back()->withErrors(['Erorrs'=>$e->getMessage()]);
    }
    }
    public function edit($id){}
    public function update($request,$id){
        try{
            $rayupdate=Ray::findOrfail($id);
            $rayupdate->description=$request->description;
           
            $rayupdate->save();
            session()->flash('edit');
            return redirect()->back();
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['Erorrs'=>$e->getMessage()]);
        }
    }
    public function destroy($request){
Ray::destroy($request->id);
session()->flash('delete');
return redirect()->back();
    }
}