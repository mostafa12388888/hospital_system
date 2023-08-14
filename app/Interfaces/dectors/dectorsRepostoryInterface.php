<?php
namespace App\Interfaces\dectors;

use PhpParser\Builder\Interface_;

Interface dectorsRepostoryInterface{
    public function index();
    public function create();
    public function store($request);
    public function edit($id);
    public function update($request);
    public function destroy($request);
    public function update_status($request);
    public function update_password($request);

}