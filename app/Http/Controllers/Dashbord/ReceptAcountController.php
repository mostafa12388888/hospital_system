<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\invoices\ReceiptRepostoryInterfaces;
class ReceptAcountController extends Controller
{
    private  $Recept;
   public function __construct(ReceiptRepostoryInterfaces $Recept)
   {
    $this-> Recept= $Recept;
   }
    public function index()
    {
       return  $this-> Recept->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return  $this-> Recept->create();
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return  $this-> Recept->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        
        return  $this->Recept->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return  $this-> Recept->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return  $this-> Recept->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return  $this-> Recept->destroy($request);
    }
}
