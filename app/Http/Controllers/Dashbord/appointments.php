<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Controller;
use App\Mail\ApintMentConfirmation;
use App\Models\Appointment;
use App\Models\Appotment2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Exception;
use Twilio\Rest\Client;


class appointments extends Controller
{
    public function keep_up(){
        $appointments=Appotment2::where('type','منتهي')->get();
        return view('Dashbord.appointments.index',compact('appointments'));
    }
    public function approval(){
        $appointments=Appotment2::where('type','مؤكد')->get();
        return view('Dashbord.appointments.index2',compact('appointments'));
    }
    public function index()
    {
        $appointments=Appotment2::where('type','غير مؤكد')->get();
        return view('Dashbord.appointments.index',compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::beginTransaction();
try{

        $apoint= Appotment2::findOrFail($id);
        $apoint->update([
        'type'=>'مؤكد',
        'appointment'=>$request->appointment,
       ]);
       //send gmail
       Mail::to( $apoint->email)->send(new ApintMentConfirmation($apoint->name,$apoint->appointment));

       // send sms
       $receiverNumber = "+201060688891";
        $message = "This is testing from CodeSolutionStuff.com";
       $account_sid = getenv("TWILIO_SID");
       $auth_token = getenv("TWILIO_TOKEN");
       $twilio_number = getenv("TWILIO_FROM");

       $client = new Client($account_sid, $auth_token);
       $client->messages->create($receiverNumber, [
           'from' => $twilio_number,
           'body' => $message]);

DB::commit();
       session()->flash('add');
       return redirect()->route('appointmets.index');
    }catch(\Exception $e){
        DB::rollBack();
        return redirect()->back()->with(["error"=>$e->getMessage()]);
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Appotment2::destroy($id);

       session()->flash('delete');
       return redirect()->route('appointmets.index');
    }
}
