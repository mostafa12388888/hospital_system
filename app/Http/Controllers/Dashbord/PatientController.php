<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Controller;
use App\Interfaces\patient\patiantIntRepostoryerface;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public $Patient;
    public function __construct(patiantIntRepostoryerface $Patient)
    {
        $this->Patient=$Patient;
        
    }
    public function index()
    {
       return  $this->Patient->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return $this->Patient->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return  $this->Patient->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return  $this->Patient->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       return  $this->Patient->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       return  $this->Patient->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
      return  $this->Patient->destroy($request);
    }
}
