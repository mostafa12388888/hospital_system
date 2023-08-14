<?php

namespace App\Http\Controllers\LaboratoryEmployee_Dashbord;

use App\Http\Controllers\Controller;
use App\Interfaces\LaboratoryEmployee_Dashbord\laboratorieEmployeRepostoryInterface;
use Illuminate\Http\Request;

class laboratorieEmployeController extends Controller
{
    private $employ;
    public function __construct(laboratorieEmployeRepostoryInterface $employ)
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
    public function view_laboratorie($id){
      return   $this->employ->view_laboratorie($id);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return   $this->employ->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // return   $this->employ->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return   $this->employ->edit($id);
    }
    public function view_Laboratory(string $id)
    {
        return   $this->employ->view_laboratorie($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return   $this->employ->update($request,$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return   $this->employ->destroy($id);
    }
}
