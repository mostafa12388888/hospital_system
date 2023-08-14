<?php

namespace App\Http\Controllers\Dashbord\doctor;

use App\Http\Controllers\Controller;
use App\Interfaces\doctor_dashbord\RaysRepostoryInterFace;
use Illuminate\Http\Request;

class RaysController extends Controller
{
  public $Ray;
  public function __construct(RaysRepostoryInterFace $Ray)
  {
    $this->Ray=$Ray;
  }
    public function index()
    {
    return  $this->Ray->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return  $this->Ray->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return  $this->Ray->store($request);
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
        return  $this->Ray->update($request,$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return  $this->Ray->destroy($request);
    }
}
