<?php
namespace App\Repositery\invoices;

use App\Interfaces\invoices\paymentAcountRepostoryInterface;
use App\Models\FundAccount;
use App\Models\Patient;
use App\Models\PatientAccount;
use App\Models\PaymentAcount;
use Illuminate\Support\Facades\DB;

class paymentAcountRepostory implements paymentAcountRepostoryInterface{
    public function index(){
        $payments=PaymentAcount::all();
        return view('Dashbord.Payment.index',compact('payments'));
    }
    public function create(){
        $Patients=Patient::all();
        return view('Dashbord.Payment.add',compact('Patients'));
    }
    public function store($request){

        DB::beginTransaction();
        try{
        $paymentAcount=new PaymentAcount();
        $paymentAcount->date=date('Y-m-d');
        $paymentAcount->patiant_id=$request->patient_id;
        $paymentAcount->amount=$request->credit;
        $paymentAcount->descrption=$request->description;
        $paymentAcount->save();

        $fundAcount=new FundAccount();
          $fundAcount->date=date('Y-m-d');
          $fundAcount->payment_id=$paymentAcount->id;
         $fundAcount->Credit=$request->credit;
         $fundAcount->Depit=0.00;
         $fundAcount->save();

         $ptientAcount=new PatientAccount();
         $ptientAcount->date=date('Y-m-d');
         $ptientAcount->Patient_id=$request->patient_id;
         $ptientAcount->Payment_id=$paymentAcount->id;
         $ptientAcount->Credit=0.00;
         $ptientAcount->Debit=$request->credit;
         $ptientAcount->save();
         DB::commit();
         session()->flash('add');
         return redirect()->route('Payment.index');
        }catch(\Exception $e){
            DB::rollBack();
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }
    }
    public function edit($id){
        $Patients=Patient::all();
       $payment_accounts=PaymentAcount::findOrFail($id);
        return view('Dashbord.Payment.edit',compact('payment_accounts','Patients'));
    }
    public function show($id){
       
        $payment=PaymentAcount::findOrfail($id);
      
return view('Dashbord.Payment.print',compact('payment'));
    }
    public function update($request){
        DB::beginTransaction();
        try{
        $paymentAcount=PaymentAcount::findOrfail($request->id);
        $paymentAcount->date=date('Y-m-d');
        $paymentAcount->patiant_id=$request->patient_id;
        $paymentAcount->amount=$request->credit;
        $paymentAcount->descrption=$request->description;
        $paymentAcount->save();

        $fundAcount=FundAccount::where('payment_id',$request->id)->first();
          $fundAcount->date=date('Y-m-d');
          $fundAcount->payment_id=$paymentAcount->id;
         $fundAcount->Credit=$request->credit;
         $fundAcount->Depit=0.00;
         $fundAcount->save();

         $ptientAcount=PatientAccount::where('Payment_id',$request->id)->first();
         $ptientAcount->date=date('Y-m-d');
         $ptientAcount->Patient_id=$request->patient_id;
         $ptientAcount->Payment_id=$paymentAcount->id;
         $ptientAcount->Credit=0.00;
         $ptientAcount->Debit=$request->credit;
         $ptientAcount->save();
         DB::commit();
         session()->flash('add');
         return redirect()->route('Payment.index');
        }catch(\Exception $e){
            DB::rollBack();
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }
    }
    public function destroy($request){
        PaymentAcount::destroy($request->id);
        session()->flash('delete');
        return redirect()->route('Payment.index');
    }
}