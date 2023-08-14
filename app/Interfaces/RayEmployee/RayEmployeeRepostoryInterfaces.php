<?php
namespace App\Interfaces\RayEmployee;

use GuzzleHttp\Psr7\Request;

interface RayEmployeeRepostoryInterfaces {
    public function index();
    public function create();
    public function store($request);
    public function Update($request,$id);
    public function destroy($id);
    public function show($id);
}