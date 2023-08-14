<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Controller;
use App\Repositery\invoices\paymentAcountRepostory;
use Illuminate\Http\Request;

class PaymentAcountController extends Controller
{
    public $paymet;
    public function __construct(paymentAcountRepostory $paymet)
    {
        $this->paymet=$paymet;
    }
    public function index()
    {
      return  $this->paymet->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return  $this->paymet->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return  $this->paymet->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return  $this->paymet->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return  $this->paymet->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return  $this->paymet->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return  $this->paymet->destroy($request);
    }
}
