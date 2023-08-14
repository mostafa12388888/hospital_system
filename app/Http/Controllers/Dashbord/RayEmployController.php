<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Controller;
use App\Interfaces\RayEmployee\RayEmployeeRepostoryInterfaces;
use Illuminate\Http\Request;

class RayEmployController extends Controller
{
   public $employ;
    public function __construct(RayEmployeeRepostoryInterfaces $employ)
    {
        $this->employ=$employ;
    }
    public function index()
    {
        return $this->employ->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return $this->employ->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->employ->store($request);
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
        return $this->employ->store($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return $this->employ->update($request,$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return $this->employ->destroy($id);
    }
}
