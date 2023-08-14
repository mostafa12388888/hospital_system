<?php
namespace App\Repositery\Services;

use App\Interfaces\Services\ServicesRepostoryInterface ;
use App\Models\Section;
use App\Models\Service;

class ServicesRepostory implements ServicesRepostoryInterface {
    public function index(){
       $services= Service::all();
return view('Dashbord.Services.Single Service.index',compact('services'));
    }
    public function create(){

    }
    public function store($request){
        try{
$services=new Service();
$services->description=$request->input('description');
$services->price=$request->input('price');
$services->status=1;
// $services->save();
$services->name=$request->input('name');
$services->save();
session()->flash('add');
return redirect()->route('Services_admin.index');
 }catch(\Exception $e){
            return redirect()->back()->with(['error'=>$e->getMessage()]);
        }
    }
    public function edit($id){

    }
    public function update($request){
try{
Service::findOrFail($request->id)->update([
    'description'=>$request->input('description'),
    'price'=>$request->input('price'),
    'status'=>$request->input('status'),
    'name'=>$request->input('name'),
]);
session()->flash('update');
return redirect()->route('Services_admin.index');
}catch(\Exception $e){
    return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
}
    }
    public function destroy($request){
try{
        Service::destroy($request->id);
session()->flash('delete');
return redirect()->route('Services_admin.index');
}catch(\Exception $e){
    return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
}
    }
}