<?php

namespace App\Http\Controllers\LaboratoryEmployee;

use App\Http\Controllers\Controller;
use App\Interfaces\LaboratoryEmployee\LaboratoryEmployeeRepostoryInterfaces;
use Illuminate\Http\Request;

class LaboratoryEmployeeController extends Controller
{
   private $lab;
   public function __construct(LaboratoryEmployeeRepostoryInterfaces $lab){
    $this->lab=$lab;
   }
    public function index()
    {
       return $this->lab->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return  $this->lab->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return  $this->lab->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return  $this->lab->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return  $this->lab->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return  $this->lab->update($request,$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return  $this->lab->destroy($id);
    }
}
