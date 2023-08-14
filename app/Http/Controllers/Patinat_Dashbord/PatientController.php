<?php

namespace App\Http\Controllers\Patinat_Dashbord;

use App\Http\Controllers\Controller;
use App\Interfaces\patient\patientDeatilsRepostoryInterFaace;
use Illuminate\Http\Request;
use PhpParser\Builder\Function;
use PhpParser\Node\Expr\FuncCall;

class PatientController extends Controller
{
    private  $patiet;
    public Function __construct(patientDeatilsRepostoryInterFaace $patiet)
    {
        $this-> patiet= $patiet;
        
    }
    public function index()
    {
        return  $this-> patiet->index();
    }
    public function Payment(){
        return  $this-> patiet->Payment();
    }
    public function RayShow(){
        return  $this-> patiet->RayShow();
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this-> patiet->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this-> patiet->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return  $this-> patiet->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return  $this-> patiet->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return  $this-> patiet->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return  $this-> patiet->destroy($request);
    }
}
