<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Controller;
use App\Interfaces\insurance\insuranceRepostoryInterface;
use Illuminate\Http\Request;

class insuranceController extends Controller
{
    private  $insurace;
   public function __construct(insuranceRepostoryInterface $insurace)
   {
    $this->insurace= $insurace;
   }
    public function index()
    {
        return  $this->insurace->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return  $this->insurace->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return  $this->insurace->store($request);
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
        return  $this->insurace->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return  $this->insurace->upadte($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return  $this->insurace->destroy($request);
    }
}
