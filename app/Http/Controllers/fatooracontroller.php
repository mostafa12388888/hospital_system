<?php

namespace App\Http\Controllers;

use App\Http\Services\FatoraServices;
use Illuminate\Http\Request;

class fatooracontroller extends Controller
{
    private $FatoraServices;
    public function __construct(FatoraServices $FatoraServices)
    {
        $this->FatoraServices=$FatoraServices;
    }
    public function payorder(){
         $data= [
            'CustomerName'=> 'Mostafa',
            'NotificationOption'=> "LNK",
            'InvoiceValue'=> 100,
            'CustomerEmail'=> "kostafa606888@gmail.com",
            'CallBackUrl'=> env('succes_url'),
            'ErrorUrl'=> env('error_url'),
            'Language'=> 'en',
            'DisplayCurrencyIso'=> 'SAR',
        ];

      return  $this->FatoraServices->SendPayment($data);
    }
    function paymentcallback(Request $request){
// dd($request);
//save the trans action in data base
$data=[];
$data['Key']=$request->paymentId;
$data['KeyType']='paymentId';

return $this->FatoraServices->getPaymentStatus($data);

    }
}

