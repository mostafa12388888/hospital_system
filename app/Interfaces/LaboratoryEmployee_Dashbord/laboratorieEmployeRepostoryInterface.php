<?php
namespace App\Interfaces\LaboratoryEmployee_Dashbord;



Interface laboratorieEmployeRepostoryInterface{
    public function index();
    public function create();
    public function store($request);
    public function edit($id);
   
    public function update($request,$id);
    public function destroy($request);
    public function view_laboratorie($id);

}