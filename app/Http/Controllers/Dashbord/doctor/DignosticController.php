<?php

namespace App\Http\Controllers\Dashbord\doctor;

use App\Http\Controllers\Controller;
use App\Interfaces\doctor_dashbord\DignocesRepositoryInterface;
use Illuminate\Http\Request;

class DignosticController extends Controller
{
    private $dignostic;
    public function __construct(DignocesRepositoryInterface $dignostic)
    {
        $this->dignostic=$dignostic;
    }
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return  $this->dignostic->store($request);
    }
    public function add_review(Request $request)
    {
        return  $this->dignostic->add_review($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return  $this->dignostic->show($id);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
