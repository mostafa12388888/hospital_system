<?php
namespace App\Interfaces\doctor_dashbord;

interface DignocesRepositoryInterface {
    public function index();
    public function add_review($request);

    public function create();
    public function store($request);
    public function edit($id);
    public function show($id);
    public function update($request);
    public function destroy($request);
}