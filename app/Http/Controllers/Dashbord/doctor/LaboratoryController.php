<?php

namespace App\Http\Controllers\Dashbord\doctor;

use App\Http\Controllers\Controller;
use App\Interfaces\doctor_dashbord\LaboratoryRepostoryInterface;
use Illuminate\Http\Request;

class LaboratoryController extends Controller
{
    public $Lab;
    public function __construct(LaboratoryRepostoryInterface $Lab)
    {
        $this->Lab=$Lab;
    }
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
        
      return  $this->Lab-> store( $request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return  $this->Lab->show($id);
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
        return  $this->Lab-> update( $request,$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return  $this->Lab-> destroy( $request);
    }
}
