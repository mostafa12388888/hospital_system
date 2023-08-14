<?php
namespace App\Interfaces\doctor_dashbord;

interface RaysRepostoryInterFace {
    public function index();
    public function create();
    public function store($request);
    public function edit($id);
    public function update($request,$id);
    public function destroy($request);
}