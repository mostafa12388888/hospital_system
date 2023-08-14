<?php
namespace App\Repositery\doctor_dashbord;
use App\Interfaces\doctor_dashbord\invoicesRepostoryInterface;
use App\Models\Invoice;
use App\Models\Ray;
use Illuminate\Support\Facades\Auth;

class invoicesRepostory implements invoicesRepostoryInterface {
    public function index(){
$invoices=Invoice::where('doctor_id',Auth::user()->id)->where('invoice_status',1)->get();
return view('Dashbord.Doctors.invoices.index',compact('invoices'));
    }
    public function ReviewInvoices(){
$invoices=Invoice::where('doctor_id',Auth::user()->id)->where('invoice_status',2)->get();
return view('Dashbord.Doctors.invoices.completed_invoices',compact('invoices'));
    }
    public function CompleatInvoices(){
$invoices=Invoice::where('doctor_id',Auth::user()->id)->where('invoice_status',3)->get();
return view('Dashbord.Doctors.invoices.review_invoices',compact('invoices'));
    }
    public function show($id){
        $rays=Ray::findOrFail($id);
        if($rays->doctor_id !=Auth::user()->id)
        {
         abort(404);
         // return redirect()->back()->withErrors(['error'=>'لا توجد اشعه خاصه بالمرضي بتوعك يا دكتور ']);
 
        }
        return view('Dashbord.Doctors.invoices.view_rays',compact('rays'));
    }
    public function add_review(){
        
    }
      
    public function store($request){}
    public function edit($id){}
  
    public function update($request){}
    public function destroy($request){}
}