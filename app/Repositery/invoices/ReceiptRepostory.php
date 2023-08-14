<?php
namespace App\Repositery\invoices;

use App\Interfaces\invoices\ReceiptRepostoryInterfaces;
use App\Models\FundAccount;
use App\Models\Patient;
use App\Models\PatientAccount;
use App\Models\ReciptAcout;
use Illuminate\Support\Facades\DB;

class ReceiptRepostory implements ReceiptRepostoryInterfaces{
    public function index(){
$receipts=ReciptAcout::all();
return view('Dashbord.Receipt.index',compact('receipts'));

    }
    public function create(){
        $Patients=Patient::all();
        return view('Dashbord.Receipt.add',compact('Patients'));
    }
    public function store($request){
        DB::beginTransaction();
        try{
            $Receipts=new ReciptAcout();
            $Receipts->date=date('Y-m-d');
            $Receipts->descrption=$request->input('description');
            $Receipts->amount=$request->input('Debit');
            $Receipts->patiant_id=$request->input('patient_id');
            $Receipts->save();

            $Fun_Acount=new FundAccount();
            $Fun_Acount->date=date('Y-m-d');
            $Fun_Acount->recipt_id=$Receipts->id;
            $Fun_Acount->Credit=0.00;
            $Fun_Acount->Depit=$request->Debit;
            $Fun_Acount->save();

            $ptientAcount=new PatientAccount();
            $ptientAcount->date=date('Y-m-d');
            $ptientAcount->Patient_id=$request->patient_id;
            $ptientAcount->recipt_id=$Receipts->id;
            $ptientAcount->Credit=$request->Debit;
            $ptientAcount->Debit=0.00;
            $ptientAcount->save();
            DB::commit();
            session()->flash('add');
            return redirect()->route('Receipt.index');
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }
    }
    public function edit($id){
        $Patients=Patient::all();
        $receipt_accounts=ReciptAcout::findorfail($id);
        // return $receipt_accounts;
        return view('Dashbord.Receipt.edit',compact('Patients','receipt_accounts'));
    }
    public function show($id){
       
        $receipt=ReciptAcout::findOrfail($id);
      
return view('Dashbord.Receipt.print',compact('receipt'));
    }
    public function update($request){
        DB::beginTransaction();
        try{
            $Receipts=ReciptAcout::findOrfail($request->id);
            $Receipts->date=date('Y-m-d');
            $Receipts->descrption=$request->input('description');
            $Receipts->amount=$request->input('Debit');
            $Receipts->patiant_id=$request->input('patient_id');
            $Receipts->save();

            $Fun_Acount=FundAccount::where('recipt_id',$request->id)->first();
            $Fun_Acount->date=date('Y-m-d');
            // $Fun_Acount->recipt_id=$Receipts->id;
            $Fun_Acount->Credit=0.00;
            $Fun_Acount->Depit=$request->Debit;
            $Fun_Acount->save();

            $ptientAcount=PatientAccount::where('recipt_id',$request->id)->first();
            $ptientAcount->date=date('Y-m-d');
            $ptientAcount->Patient_id=$request->patient_id;
            // $ptientAcount->recipt_id=$Receipts->id;
            $ptientAcount->Credit=$request->Debit;
            $ptientAcount->Debit=0.00;
            $ptientAcount->save();
            DB::commit();
            session()->flash('edit');
            return redirect()->route('Receipt.index');
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }
    }
    public function destroy($request){
        ReciptAcout::destroy($request);
        session()->flash('delete');
        return redirect()->route('Receipt.index');
    }
}