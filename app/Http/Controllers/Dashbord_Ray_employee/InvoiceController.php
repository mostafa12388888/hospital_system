<?php

namespace App\Http\Controllers\Dashbord_Ray_employee;

use App\Http\Controllers\Controller;
use App\Interfaces\Dashbord_Ray_employee\invoicesRepostoryInterface;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
   private $invoices;
   public function __construct(invoicesRepostoryInterface $invoices)
   {
    $this->invoices=$invoices;
   }
    public function index()
    {
        return $this->invoices->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->invoices->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->invoices->store($request);
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
        return $this->invoices->edit($id);
    }

    public function view_rays($id){
        return $this->invoices->view_rays($id);
    }
    public function update(Request $request, string $id)
    {
        return $this->invoices->update($request,$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->invoices->destroy($request);
    }
}
