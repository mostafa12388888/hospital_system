<?php 
namespace App\Interfaces\patient;

interface patiantIntRepostoryerface {
    public function index();
    public function create();
    public function store($request);
    public function edit($id);
    public function show($id);
    public function update($request);
    public function destroy($request);
}

