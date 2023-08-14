<?php
namespace App\Interfaces\doctor_dashbord;

interface LaboratoryRepostoryInterface {
   
    public function store($request);
  
    public function update($request,$id);
    public function destroy($request);
    public function show($id);
}