<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Controller;
use App\Interfaces\Sections\SectionRepostoryInterface;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    private $section;
    public function __construct(SectionRepostoryInterface $section)
    {
      $this->section=$section;  
    }
    public function index()
    {
        return $this->section->index();
    }
    /**
     * Store a newly created resource in storage.
     */
    public function show($id)
    {
       return $this->section->show($id);
    }
    public function store(Request $request)
    {
       return $this->section->store($request);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       return $this->section->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->section->destroy($request);
    }
}
