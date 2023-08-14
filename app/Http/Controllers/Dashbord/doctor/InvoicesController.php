<?php

namespace App\Http\Controllers\Dashbord\doctor;

use App\Http\Controllers\Controller;
use App\Interfaces\doctor_dashbord\invoicesRepostoryInterface;
use Illuminate\Http\Request;

class InvoicesController extends Controller
{
    private $invoice;
    public function __construct(invoicesRepostoryInterface $invoice)
    {
        $this->invoice=$invoice;
    }
    public function index()
    {
        return $this->invoice->index();
    }
    public function CompleatInvoices(){
        return $this->invoice->CompleatInvoices();
    }
    public function ReviewInvoices(){
        return $this->invoice->ReviewInvoices();
    }
    /**
     * Show the form for creating a new resource.
     */
    public function add_review(){
        return $this->invoice->add_review();
    }
    public function create()
    {
        // return $this->invoice->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->invoice->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->invoice->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return $this->invoice->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return $this->invoice->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->invoice->destroy($request);
    }
}
