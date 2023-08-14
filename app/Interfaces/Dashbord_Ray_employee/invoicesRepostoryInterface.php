<?php
namespace App\Interfaces\Dashbord_Ray_employee;



Interface invoicesRepostoryInterface{
    public function index();
    public function create();
    public function store($request);
    public function edit($id);
    public function update($request,$id);
    public function destroy($request);
    public function view_rays($id);

}