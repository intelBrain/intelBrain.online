<?php

namespace App\Http\Controllers;

use App\MpesaTransaction;
use App\Models\User;
use App\Models\ActivityLog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class MpesaController extends Controller
{

    /**
     * Lipa na M-PESA password
     * */

    public function lipaNaMpesaPassword()
    {
        $lipa_time = Carbon::rawParse('now')->format('YmdHms');
        $passkey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
        $BusinessShortCode = 174379;
        $timestamp =$lipa_time;

        $lipa_na_mpesa_password = base64_encode($BusinessShortCode.$passkey.$timestamp);
        return $lipa_na_mpesa_password;
    }


    /**
     * Lipa na M-PESA STK Push method
     * */

    public function customerMpesaSTKPush($id, Request $request)
    {
        if($request->has('payment') && $request->payment == 'mpesa' && $request->has('checkout_amount'))
        {
            $url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
            
            $user = User::findOrFail($id);
            $phone =$user->phone;
            $phone = (substr($phone, 0, 1) == "+") ? str_replace("+", "", $phone) : $phone;
            $phone = (substr($phone, 0, 1) == "0") ? preg_replace("/^0/", "254", $phone) : $phone;
            $phone = (substr($phone, 0, 1) == "7") ? "254{$phone}" : $phone;
            
            $amount = $request->checkout_amount;
            $notes = $request->order_notes;
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$this->generateAccessToken()));
            $curl_post_data = [
                //Fill in the request parameters with valid values
                'BusinessShortCode' => 174379,
                'Password' => $this->lipaNaMpesaPassword(),
                'Timestamp' => Carbon::rawParse('now')->format('YmdHms'),
                'TransactionType' => 'CustomerPayBillOnline',
                'Amount' => $amount,
                'PartyA' => $phone, // replace this with your phone number
                'PartyB' => 174379,
                'PhoneNumber' => $phone, // replace this with your phone number
                'CallBackURL' => 'https://kisiwaevoting.com/eCommerce/public/stk',
                'AccountReference' => "intelBrain Shop",
                'TransactionDesc' => "Testing stk push on sandbox"
            ];

            $data_string = json_encode($curl_post_data);

            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

            $curl_response = curl_exec($curl);
            
            $activity = ActivityLog::create([
                'user_id'=>$id,
                'activity'=>'User tried to place order for transaction: '.$curl_post_data['TransactionDesc'].' with timestamp: '.$curl_post_data['Timestamp'],
            ]);

            // return $curl_response;
            $curl_response = json_decode($curl_response);
            if($curl_response)
            {
                if(isset($curl_response->ResponseCode) && $curl_response->ResponseCode == 0)
                    {
                        return redirect()->back()->with('message', $curl_response->ResponseDescription);
                    }
                    else
                    {
                        return redirect()->back()->with('message', $curl_response->errorMessage);
                    }
            }
            else
            {
                return redirect()->back()->with('message', 'Error occured during Payment. Please try again.');
            }
        }
        return redirect()->back()->with('message', 'Error occured during Payment. Please select an item and try again.');
    }


    public function generateAccessToken()
    {
        $consumer_key=env('CONSUMER_KEY');
        $consumer_secret=env('CONSUMER_SECRET');
        $credentials = base64_encode($consumer_key.":".$consumer_secret);

        $url = "https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("Authorization: Basic ".$credentials));
        curl_setopt($curl, CURLOPT_HEADER,false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $curl_response = curl_exec($curl);
        $access_token=json_decode($curl_response);
        return $access_token->access_token;
    }


    /**
     * J-son Response to M-pesa API feedback - Success or Failure
     */
    public function createValidationResponse($result_code, $result_description){
        $result=json_encode(["ResultCode"=>$result_code, "ResultDesc"=>$result_description]);
        $response = new Response();
        $response->headers->set("Content-Type","application/json; charset=utf-8");
        $response->setContent($result);
        return $response;
    }


    /**
     *  M-pesa Validation Method
     * Safaricom will only call your validation if you have requested by writing an official letter to them
     */

    public function mpesaValidation(Request $request)
    {
        $result_code = "0";
        $result_description = "Accepted validation request.";
        return $this->createValidationResponse($result_code, $result_description);
    }

    /**
     * M-pesa Transaction confirmation method, we save the transaction in our databases
     */

    public function mpesaConfirmation(Request $request)
    {
        $content=json_decode($request->getContent());

        // $mpesa_transaction = MpesaTransaction::create([
        // 'TransactionType' => $content->TransactionType,
        // 'TransID' => $content->TransID,
        // 'TransTime' => $content->TransTime,
        // 'TransAmount' => $content->TransAmount,
        // 'BusinessShortCode' => $content->BusinessShortCode,
        // 'BillRefNumber' => $content->BillRefNumber,
        // 'InvoiceNumber' => $content->InvoiceNumber,
        // 'OrgAccountBalance' => $content->OrgAccountBalance,
        // 'ThirdPartyTransID' => $content->ThirdPartyTransID,
        // 'MSISDN' => $content->MSISDN,
        // 'FirstName' => $content->FirstName,
        // 'MiddleName' => $content->MiddleName,
        // 'LastName' => $content->LastName,
        // ]);
        

        $mpesa_transaction = new MpesaTransaction();
        $mpesa_transaction->TransactionType = $content->TransactionType;
        $mpesa_transaction->TransID = $content->TransID;
        $mpesa_transaction->TransTime = $content->TransTime;
        $mpesa_transaction->TransAmount = $content->TransAmount;
        $mpesa_transaction->BusinessShortCode = $content->BusinessShortCode;
        $mpesa_transaction->BillRefNumber = $content->BillRefNumber;
        $mpesa_transaction->InvoiceNumber = $content->InvoiceNumber;
        $mpesa_transaction->OrgAccountBalance = $content->OrgAccountBalance;
        $mpesa_transaction->ThirdPartyTransID = $content->ThirdPartyTransID;
        $mpesa_transaction->MSISDN = $content->MSISDN;
        $mpesa_transaction->FirstName = $content->FirstName;
        $mpesa_transaction->MiddleName = $content->MiddleName;
        $mpesa_transaction->LastName = $content->LastName;
        $mpesa_transaction->save();


        // Responding to the confirmation request
        $response = new Response();
        $response->headers->set("Content-Type","text/xml; charset=utf-8");
        $response->setContent(json_encode(["C2BPaymentConfirmationResult"=>"Success"]));
        // return $response;
        $user_id = User::where('phone','like',$content->MSISDN)->value('id');
        return route('payment_confirmation', $user_id)->with('message', $response);
    }


    /**
     * M-pesa Register Validation and Confirmation method
     */
    public function mpesaRegisterUrls()
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl');
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization: Bearer '. $this->generateAccessToken()));

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode(array(
            'ShortCode' => "174379",
            'ResponseType' => 'Completed',
            'ConfirmationURL' => "https://kisiwaevoting.com/eCommerce/public/api/stk/transaction/confirmation",
            'ValidationURL' => "https://kisiwaevoting.com/eCommerce/public/api/stk/validation"
        )));
        $curl_response = curl_exec($curl);
        echo $curl_response;
    }

}