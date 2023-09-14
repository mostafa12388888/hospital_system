<?php
namespace App\Http\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

// use Http\Client;

class FatoraServices{
    private $request_Client,$base_url,$headers;
    public function __construct(Client $request_Client)
    {

        $this->request_Client=$request_Client;
        $this->base_url=env('fatoora_base_url');
        $this->headers=[
            'Content-Type'=>'application/json',
            'authorization'=>'Bearer'.env('fatoorah_token')
        ];
    }

    public function BuildRequest($url,$method,$data=[]){

        $request=new Request($method,$this->base_url.$url,$this->headers);

    if(!$data)
        return false;

        $response=$this->request_Client->send($request,[
            "json"=>$data
        ]);

        if($response->getStatusCode() !=200){
            return false;
        }
        $response=json_decode($response->getBody(),true);
        return $response;
    }
    public function SendPayment($data){

        // $requestData=$this->parsePaymentData();
        $response=$this->BuildRequest("v2/SendPayment","POST",$data);

        // if($response){
        //     $this->saveTransactionPayment($data,$response['Data']['InvoiceId']);
        // }
        return $response;
    }
    public function getPaymentStatus($data){

      return  $this->BuildRequest("v2/getPaymentStatus","POST",$data);
    }
    public function saveTransactionPayment(){

    }
    public function parsePaymentData(){

    }
}
?>
