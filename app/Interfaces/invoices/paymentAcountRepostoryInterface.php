<?php 
namespace App\Interfaces\invoices;
 
interface paymentAcountRepostoryInterface{
    public function index();
    public function create();
    public function store($request);
    public function edit($id);
    public function show($id);
    public function update($request);
    public function destroy($request);
}