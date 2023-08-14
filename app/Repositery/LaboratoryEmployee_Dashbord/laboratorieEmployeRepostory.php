<?php 
namespace App\Repositery\LaboratoryEmployee_Dashbord;

use App\Interfaces\LaboratoryEmployee_Dashbord\laboratorieEmployeRepostoryInterface;
use App\Models\Laboratory;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class laboratorieEmployeRepostory implements laboratorieEmployeRepostoryInterface{
    use UploadTrait;
    public function index(){
        $invoices=Laboratory::where('case',0)->get();
        return view('Dashbord.laboratorEmploye_Dashbord.invoice.index',compact('invoices'));
    }
    public function create(){
        $invoices=Laboratory::where('case',1)->where('employee_id',Auth::user()->id)->get();
        return view('Dashbord.laboratorEmploye_Dashbord.invoice.completed_invoices',compact('invoices'));
    }
    public function store($request){}
    public function edit($id){
        
        $invoice=Laboratory::findOrfail($id);
        return view('Dashbord.laboratorEmploye_Dashbord.invoice.add_diagnosis',compact('invoice'));
    }
        public function update($request,$id){
            // dd($request);
                DB::beginTransaction();
                try{
                    
                    $invoice=Laboratory::findOrfail($id);$invoice->update([
                    'case'=>1,
                    'description_employee'=>$request->input('description_employee'),
                    'employee_id'=>Auth::user()->id,
                ]);
            if($request->hasfile('photo'))
                foreach($request->photo as $value_photo)
                $this->veryfiedandStoreImageForeach($value_photo ,'Laboratory_Employee','Upload_image',$invoice->id,'App\Models\Laboratory');
            DB::commit();
            session()->flash('add');
            return redirect()->route('invoices_Laboratory_employee.index');
                }catch(\Exception $e){
            DB::rollBack();
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
       }}
    public function view_laboratorie($id){
        $rays=Laboratory::findOrFail($id);
        if($rays->employee_id !=Auth::user()->id)
        {
         abort(404);
         // return redirect()->back()->withErrors(['error'=>'لا توجد اشعه خاصه بالمرضي بتوعك يا دكتور ']);
        }
        return view('Dashbord.laboratorEmploye_Dashbord.invoice.patient_details',compact('rays'));
    }
   
    public function destroy($request){}
   
   
}