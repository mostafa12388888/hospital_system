<?php

namespace App\Http\Controllers;

use App\Interfaces\Ambulance\AmbulanceInterface;
use Illuminate\Http\Request;

class AmbulanceController extends Controller
{
    private $Ambulance;
    public function __construct(AmbulanceInterface $Ambulance){
        return    $this->Ambulance=$Ambulance;
    
}
    public function index()
    {
       return $this->Ambulance->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return   $this->Ambulance->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return  $this->Ambulance->store($request);
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
        return  $this->Ambulance->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return   $this->Ambulance->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return  $this->Ambulance->destroy($request);
    }
}
