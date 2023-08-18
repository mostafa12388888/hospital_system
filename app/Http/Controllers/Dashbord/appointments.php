<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Controller;
use App\Mail\ApintMentConfirmation;
use App\Models\Appointment;
use App\Models\Appotment2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


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
        Mail::to( 'mk1730@fayoum.edu.eg')->send(new ApintMentConfirmation);
        $apoint= Appotment2::findOrFail($id);
        $apoint->update([
        'type'=>'مؤكد',
        'appointment'=>$request->appointment,
       ]);


       session()->flash('add');
       return redirect()->route('appointmets.index');
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
