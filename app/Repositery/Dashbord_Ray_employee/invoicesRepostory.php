<?php 
namespace App\Repositery\Dashbord_Ray_employee;

use App\Interfaces\Dashbord_Ray_employee\invoicesRepostoryInterface;
use App\Models\Ray;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class invoicesRepostory implements invoicesRepostoryInterface{
   use UploadTrait;
    public function index(){
        $invoices=Ray::where('case',0)->get();
        return view('Dashbord.Ray_employee_dashbord.invoice.index',compact('invoices'));
    }
    public function create(){
        $invoices=Ray::where('case',1)->where('employee_id',Auth::user()->id)->get();
        return view('Dashbord.Ray_employee_dashbord.invoice.completed_invoices',compact('invoices'));
    }
    public function store($request){}
    public function edit($id){
        
        $invoice=Ray::findOrfail($id);
        return view('Dashbord.Ray_employee_dashbord.invoice.add_diagnosis',compact('invoice'));
    }
        public function update($request,$id){
            // dd($request);
                DB::beginTransaction();
                try{
                    
                    $invoice=Ray::findOrfail($id);$invoice->update([
                    'case'=>1,
                    'description_employee'=>$request->input('description_employee'),
                    'employee_id'=>Auth::user()->id,
                ]);
            if($request->hasfile('photo'))
                foreach($request->photo as $value_photo)
                $this->veryfiedandStoreImageForeach($value_photo ,'Ray_Employee','Upload_image',$invoice->id,'App\Models\Ray');
            DB::commit();
            session()->flash('add');
            return redirect()->route('invoices_ray_employee.index');
                }catch(\Exception $e){
            DB::rollBack();
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
       }}
    public function view_rays($id){
        $rays=Ray::findOrFail($id);
        if($rays->employee_id !=Auth::user()->id)
        {
         abort(404);
         // return redirect()->back()->withErrors(['error'=>'لا توجد اشعه خاصه بالمرضي بتوعك يا دكتور ']);
        }
        return view('Dashbord.Ray_employee_dashbord.invoice.patient_details',compact('rays'));
    }
    public function destroy($request){}
   

}
