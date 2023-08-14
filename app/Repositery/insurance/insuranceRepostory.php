<?php 
namespace App\Repositery\insurance;
use App\Interfaces\insurance\insuranceRepostoryInterface;
use App\Models\Insurance;

class insuranceRepostory implements insuranceRepostoryInterface{
    public function index(){
$insurances=Insurance::all();
return view('Dashbord.Patient.index',compact('insurances'));
    }
    public function create(){
        return view('Dashbord.insurance.create');
    }
    public function store($request){
Insurance::create([
    'notes'=>$request->notes,
    'company_rate'=>$request->Company_rate,
    'discount_percentage'=>$request->discount_percentage,
    'name'=>$request->name,
    'insurance_code'=>$request->insurance_code,
    'status'=>1,
]);
session()->flash('add');
return redirect()->route('insurance.index');
    }
    public function edit($id){
      $insurances=  Insurance::findOrFail($id);
return view('Dashbord.insurance.edit',compact('insurances'));
    }
    public function upadte($request){
        Insurance::findOrFail($request->id)->update([
            'notes'=>$request->notes,
            'company_rate'=>$request->Company_rate,
            'discount_percentage'=>$request->discount_percentage,
            'name'=>$request->name,
            'insurance_code'=>$request->insurance_code,
            'status'=>$request->status|0,
        ]);
        session()->flash('update');
        return redirect()->route('insurance.index');
    }
    public function destroy($request){
        Insurance::destroy($request->id);
        session()->flash('delete');
        return redirect()->route('insurance.index');
    }
}