<?php 
namespace App\Interfaces\patient;

interface patientDeatilsRepostoryInterFaace {
    public function RayShow();
    public function index();
    public function Payment();
    public function create();
    public function store($request);
    public function edit($id);
    public function show($id);
    public function update($request);
    public function destroy($request);
}

