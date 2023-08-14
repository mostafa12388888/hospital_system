<?php
namespace App\Interfaces\insurance;

interface insuranceRepostoryInterface{
    public function index();
    public function create();
    public function store($request);
    public function edit($id);
    public function upadte($request);
    public function destroy($request);
}