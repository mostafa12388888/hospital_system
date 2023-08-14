<?php 
namespace App\Repositery\patient;

use App\Interfaces\patient\patientDeatilsRepostoryInterFaace;
use App\Models\Invoice;
use App\Models\Laboratory;
use App\Models\Ray;
use App\Models\ReciptAcout;
use Illuminate\Support\Facades\Auth;

class patientDeatilsRepostory implements patientDeatilsRepostoryInterFaace{
    public function index(){
        $invoices=Invoice::where('patient_id',Auth::user()->id)->get();
        return view('Dashbord.Patient_dashbord.invoices',compact('invoices'));
    }
    public function create(){
        $laboratories=Laboratory::where('patient_id',Auth::user()->id)->get();
        return view('Dashbord.Patient_dashbord.laboratories',compact('laboratories'));
    }
    public function RayShow(){
        $rays=Ray::where('patient_id',Auth::user()->id)->get();
        return view('Dashbord.Patient_dashbord.rays',compact('rays'));
    }
    public function store($request){}
    public function edit($id){
        $rays=Ray::findOrFail($id);
        if($rays->doctor_id !=Auth::user()->id)
        {
         abort(404);
         // return redirect()->back()->withErrors(['error'=>'لا توجد اشعه خاصه بالمرضي بتوعك يا دكتور ']);
 
        }
        return view('Dashbord.Doctors.invoices.view_rays',compact('rays'));
    }
    public function show($id){
        $rays=Laboratory::findOrFail($id);
        if($rays->doctor_id !=Auth::user()->id)
        {
         abort(404);
         // return redirect()->back()->withErrors(['error'=>'لا توجد اشعه خاصه بالمرضي بتوعك يا دكتور ']);
 
        }
        return view('Dashbord.Doctors.invoices.view_rays',compact('rays'));
    }
    
    public function Payment(){
$payments=ReciptAcout::where('patiant_id',Auth::user()->id)->get();
return view('Dashbord.Patient_dashbord.payments',compact('payments'));
    }
    public function update($request){}
    public function destroy($request){}
}