<?php 
namespace App\Repositery\LaboratoryEmployee;

use App\Interfaces\LaboratoryEmployee\LaboratoryEmployeeRepostoryInterfaces;
use App\Models\LaboratoryEmployee;
use Illuminate\Support\Facades\Hash;

class LaboratoryEmployeeRepostory implements LaboratoryEmployeeRepostoryInterfaces{
    public function index(){
      $laboratorie_employees=  LaboratoryEmployee::all();
        return view('Dashbord.laboratorie_employee.index',compact('laboratorie_employees'));

    }
    public function create(){}
    public function store($request){
        LaboratoryEmployee::create([
            'name'=>$request->name,
            'password'=>Hash::make($request->password),
            'email'=>$request->email,
        ]);
        session()->flash('add');
        return redirect()->route('laboratorie_employee.index');
    }
    public function edit($id){}
    public function show($id){}
    public function update($request,$id){
        if(empty($request->password)){
            
            LaboratoryEmployee::findOrFail($id)->Update([
                'name'=>$request->name,
                'email'=>$request->email,
            ]);
            session()->flash('edit');
            return redirect()->route('laboratorie_employee.index');
        }
       
        LaboratoryEmployee::findOrFail($id)->Update([
            'name'=>$request->name,
            'password'=>Hash::make($request->password),
            'email'=>$request->email,
        ]);
        session()->flash('edit');
        return redirect()->route('laboratorie_employee.index');
    }
    public function destroy($id){
        LaboratoryEmployee::destroy($id);
        session()->flash('delete');
        return redirect()->route('laboratorie_employee.index');
    }
}