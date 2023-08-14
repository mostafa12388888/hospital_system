<?php
namespace App\Interfaces\doctor_dashbord;

interface invoicesRepostoryInterface {
    public function index();
    public function ReviewInvoices();
    public function CompleatInvoices();
    public function add_review();
    public function store($request);
    public function edit($id);
    public function show($id);
    public function update($request);
    public function destroy($request);
}