<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Controller;
use App\Interfaces\dectors\dectorsRepostoryInterface;
use Illuminate\Http\Request;

class DectorsController extends Controller
{
    private $dector;
public function __construct(dectorsRepostoryInterface $dector)
{
    $this->dector=$dector;
    
}
    public function index()
    {
       return $this->dector->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->dector->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->dector->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return $this->dector->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return $this->dector->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->dector->destroy($request);
    }
    public function update_status(Request $request){
return $this->dector->update_status($request);
    }
    public function update_password(Request $request){
        return $this->dector->update_password($request);
    }
}
