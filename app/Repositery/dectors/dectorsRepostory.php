<?php 
namespace App\Repositery\dectors;

use App\Interfaces\dectors\dectorsRepostoryInterface;
use App\Models\Appointment;
use App\Models\Appointment_Dector;
use App\Models\Doctor;
use App\Models\Section;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PhpParser\Comment\Doc;

class dectorsRepostory implements dectorsRepostoryInterface{
    use UploadTrait;
    
    public function index(){
$doctors =Doctor::with('appointments')->get();
// return $doctors;
return view('Dashbord.Doctors.index',compact('doctors'));
    }
    public function create(){
        $sections=Section::all();
        $appointments =Appointment::all();
        // return $appointments[0]->translations[0]->name;
return view('Dashbord.Doctors.create',compact('sections','appointments'));
    }
    public function store($request){
        // return $request->input('appointments');
        try{
        //    dd($request->input('section_id'));
            DB::beginTransaction();
            $doctors=new Doctor();
            $doctors->name=$request->input('name');
            $doctors->email=$request->input('email');
            $doctors->password=Hash::make($request->password);
            $doctors->phone=$request->input('phone');
            $doctors->section_id=$request->input('section_id');
            $doctors->status=1;
            $doctors->save();
            // $doctors->apointments=implode(',',$request->input('appointments'));
            // dd( $doctors->appointments());
            $doctors->appointments()->attach($request->appointments);
        //  dd( $request->appointments);

          $doctors->save();
            // $appointments_id=explode(',',);
            // foreach( $request->input('appointments') as $value){
            //         Appointment_Dector::create([
            //             'appointments_id'=> $value,
            //             'docutors_id'=> $doctors->id,
            //         ]);}

// dd($request);
$this->veryfiedandStoreImage($request,'photo','docutors','Upload_image', $doctors->id,'App\Models\Doctor');

DB::commit();
session()->flash('add');
return redirect()->route('Doctors.index');
}catch(\Exception $e){
    DB::rollBack();
    return redirect()->back()->with(['error'=>$e]);
}
    }
    public function edit($id){
        $sections =Section::all();
        $appointments  =Appointment::all();
        $doctor =Doctor::findOrFail($id);
        return view('Dashbord.Doctors.edit',compact('doctor','sections','appointments'));
    }
    public function update($request){
        $docutor= Doctor::findOrFail($request->id);
        $docutor->update([
'name'=>$request->input('name'),
'email'=>$request->input('email'),
'phone'=>$request->input('phone'),
'section_id'=>$request->input('section_id'),
        ]);
        // Appointment_Dector::destroy($request->input('appointments'));
        // if( $request->input('appointments') )
        // foreach( $request->input('appointments') as $value){
        //     Appointment_Dector::create([
        //         'appointments_id'=> $value,
        //         'docutors_id'=> $request->id,
        //     ]);}

        $docutor->appointments()->sync($request->appointments);
        if($request->hasfile('photo')){
            if($docutor->image){
              
                $this->DeleteAttachment('Upload_image','docutors/'.$docutor->image->fileame,$request->id,  $docutor->image->fileame);
            }
            $this-> veryfiedandStoreImage( $request,'photo','docutors','Upload_image',$request->id,'App\Models\Doctor');
            }
            return redirect()->route('Doctors.index');   
    }
    public function destroy($request){

        $value_delte_selected=explode(',',$request->delete_select_id);
        // return $value_delte_selected;
        if( $request->input('appointments') )
foreach($value_delte_selected as $value){
    $doctor=Doctor::findOrfail($value);
   
    if( $doctor->image){
      
$this->DeleteAttachment('Upload_image','docutors/'.$doctor->image->fileame,$value,$doctor->image->fileame);
    }
}
Doctor::destroy($value_delte_selected);
session()->flash('delete');
return redirect()->route('Doctors.index');

    }
public function update_password($request){
    Doctor::findOrfail($request->input('id'))->update([
        'password'=>Hash::make($request->input('password')),
    ]);
    session()->flash('update');
return redirect()->back();
}

public function update_status($request){
    // return $request;
    Doctor::findOrfail($request->input('id'))
    ->update([
        'status'=>$request->input('status'),
    ]);
    session()->flash('update');
return redirect()->back();
}
}