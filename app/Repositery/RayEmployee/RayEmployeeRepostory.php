<?php
namespace App\Repositery\RayEmployee;
use App\Interfaces\RayEmployee\RayEmployeeRepostoryInterfaces;
use App\Models\Ray;
use App\Models\RayEmployee;
use Illuminate\Support\Facades\Hash;

class RayEmployeeRepostory implements RayEmployeeRepostoryInterfaces {
    public function index(){
$ray_employees=RayEmployee::all();
return view('Dashbord.ray_employee.index',compact('ray_employees'));
    }
    public function create(){

    }
    public function store($request){
        RayEmployee::create([
            'name'=>$request->name,
            'password'=>Hash::make($request->password),
            'email'=>$request->email,
        ]);
        session()->flash('add');
        return redirect()->route('ray_employee.index');
    }
    public function Update($request,$id){
        if(empty($request->password)){
            
            RayEmployee::findOrFail($id)->Update([
                'name'=>$request->name,
                'email'=>$request->email,
            ]);
            session()->flash('edit');
            return redirect()->route('ray_employee.index');
        }
       
        RayEmployee::findOrFail($id)->Update([
            'name'=>$request->name,
            'password'=>Hash::make($request->password),
            'email'=>$request->email,
        ]);
        session()->flash('edit');
        return redirect()->route('ray_employee.index');
    }
    public function destroy($id){
        RayEmployee::destroy($id);
        session()->flash('delete');
        return redirect()->route('ray_employee.index');
    }
    public function show($id){

    }
}
