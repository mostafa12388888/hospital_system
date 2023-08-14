<?php
namespace App\Interfaces\Sections;

use GuzzleHttp\Psr7\Request;

interface SectionRepostoryInterface {
public function index();
public function store($request);
public function Update($request);
public function destroy($request);
public function show($id);
}