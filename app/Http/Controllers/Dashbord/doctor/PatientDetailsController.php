<?php

namespace App\Http\Controllers\Dashbord\doctor;

use App\Http\Controllers\Controller;
use App\Models\Dignostic;
use App\Models\Laboratory;
use App\Models\Ray;
use Illuminate\Http\Request;

class PatientDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
       $patient_records=Dignostic::where('patient_id',$id)->get();
       $patient_rays=Ray::where('patient_id',$id)->get();
       $patient_Laboratories=Laboratory::where('patient_id',$id)->get();
       return view('Dashbord.Doctors.invoices.patient_details',compact('patient_records','patient_rays','patient_Laboratories'));


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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
