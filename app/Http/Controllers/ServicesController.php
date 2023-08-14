<?php

namespace App\Http\Controllers;

use App\Interfaces\Services\ServicesRepostoryInterface;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public $Services;
    public function __construct(ServicesRepostoryInterface $Services)
    {
        $this->Services=$Services;
    }
    public function index()
    {
       return  $this->Services->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return  $this->Services->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return  $this->Services->store($request);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return  $this->Services->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return  $this->Services->destroy($request);
    }
}
