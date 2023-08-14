<?php
namespace App\Repositery\Ambulance;
use App\Interfaces\Ambulance\AmbulanceInterface;
use App\Models\Ambulance;

class AmbulanceRepository implements AmbulanceInterface{
    public function index(){

$ambulances=Ambulance::all();
return view('Dashbord.Ambulances.index',compact('ambulances'));
    }
    public function create(){
        return view('Dashbord.Ambulances.create');
    }
    public function store($request){
        Ambulance::create([
    'notes'=>$request->notes,
    'driver_phone'=>$request->driver_phone,
    'driver_licence_number'=>$request->driver_license_number,
    'driver_name'=>$request->driver_name,
    'car_type'=>$request->car_type,
    'car_year_made'=>$request->car_year_made,
    'car_model'=>$request->car_model,
    'car_number'=>$request->car_number,
    
]);
session()->flash('add');
return redirect()->route('Ambulance.index');
    }
    public function edit($id){
        $ambulance=Ambulance::findOrFail($id);
        return view('Dashbord.Ambulances.edit',compact('ambulance'));
    }
    public function update($request){
        Ambulance::findOrFail($request->id)->update([
            'notes'=>$request->notes,
            'driver_phone'=>$request->driver_phone,
            'driver_licence_number'=>$request->driver_license_number,
            'driver_name'=>$request->driver_name,
            'car_type'=>$request->car_type,
            'car_year_made'=>$request->car_year_made,
            'car_model'=>$request->car_model,
            'car_number'=>$request->car_number,
            'is_available'=>$request->is_available|0,
        ]);
        session()->flash('update');
return redirect()->route('Ambulance.index');
    
    }
    public function destroy($request){
        Ambulance::destroy($request->id);
        session()->flash('delete');
        return redirect()->route('Ambulance.index');
    }
}