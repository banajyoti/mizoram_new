<?php

namespace App\Http\Controllers;

use App\Models\PaymentResponse;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function getPayment(Request $request)
    {
        if ($request->isMethod('GET')) {
            $userDetails = User::where('id', Auth::user()->id)->first();
            // Check if payment status is 3 (Already pending)
            if ($userDetails->payment_status != 3) {
                // If payment status is not 3, create a new transaction ID and update status
                $tran = $userDetails->registration_number . time();
                $userDetails->t_id = $tran;
                $userDetails->payment_status = 3;
                $userDetails->save();
            } else {
                // If already pending, use the existing transaction ID
                $tran = $userDetails->t_id;
            }

            // Set the amount based on category_id
            if ($userDetails->category_id == 1) {
                $data['amount'] = '200.00';
            } elseif (in_array($userDetails->category_id, [2, 3, 4])) {
                $data['amount'] = '150.00';
            }

            $merchantId = 'M00006275';
            $data['merchantId'] = 'M00006275';
            $data['apiKey'] = 'bJ5zs9YF5uc5GD8Ig3pg0vO8wZ7AE2WM';
            $data['txnId'] = $tran;
           // $data['amount'] = '1.00';
            $data['dateTime'] = Carbon::now()->format('Y-m-d h:i:s');
            $data['ResellerTxnId'] = 'NA';
            //$data['Rid'] = 'R0000135';
            $data['custMail'] = $userDetails->email;
            $data['custMobile'] = $userDetails->phone;
            $data['udf1'] = $userDetails->registration_number;
            $data['udf2'] = $userDetails->email;
            $data['udf3'] = $userDetails->phone;
            $data['udf4'] = "NA";
            $data['udf5'] = "NA";
            $data['channelId'] = '0';
            $data['txnType'] = 'DIRECT';
            $data['isMultiSettlement'] = '0';
            $data['returnURL'] = "https://mizopolicerec.in/getresponse";
            $data['productId'] = 'DEFAULT';
            $data['instrumentId'] = 'NA';
            $data['cardDetails'] = 'NA';
            $data['cardType'] = 'NA';
            $jsondata = json_encode($data);
            $enc = $this->get_encrypt($jsondata);
            //dd($enc,$jsondata);
            return view('pages.payment', compact('userDetails', 'enc', 'merchantId'));
        }
    }

    public function getresposne(Request $request)
    {
        // dd($request->input('respData'));
        $merchantId = $request->input('merchantId');
        $respData = $request->input('respData');
        $pgid = $request->input('pgid');
        //dd(request()->all());
        $merchantId = $request->merchantId;
        $respData = $request->respData;

        $respDecrypt = $this->get_decrypt($respData);
        $verificationResult = json_decode($respDecrypt);
        //dd($verificationResult);
        //dd($verificationResult);

        $data['payment_mode'] = $verificationResult->payment_mode;
        $data['message'] = $verificationResult->resp_message;
        $data['udf5'] = $verificationResult->udf5;
        $data['email'] = $verificationResult->cust_email_id;
        $data['udf6'] = $verificationResult->udf6;
        $data['udf3'] = $verificationResult->udf3;
        $data['merchantId'] = 'M00005777';
        $data['txnamount'] = $verificationResult->txn_amount;
        $data['udf4'] = $verificationResult->udf4;

        $data['udf1'] = $verificationResult->udf1;
        $data['udf2'] = $verificationResult->udf2;
        $data['pgRefId'] = $verificationResult->pg_ref_id;
        $data['txnid'] = $verificationResult->txn_id;

        $data['respdatetime'] = $verificationResult->resp_date_time;
        $data['banktxnId'] = $verificationResult->bank_ref_id;
        $data['resp_code'] = $verificationResult->resp_code;
        $data['txndateTime'] = $verificationResult->txn_date_time;
        $data['txnstatus'] = $verificationResult->trans_status;
        $data['phnumber'] = $verificationResult->cust_mobile_no;

        if (null != $user = User::where('phone', $data['udf3'])->first()) {

            if ($data['txnstatus'] == 'Ok') {
                $user->payment_status = 1;
                $data['status'] = 1;
                $data['user_id'] = $user->id;
                $user->save();
                Auth::login($user);
                $details = User::where('id', $user->id)
                    ->first();
                PaymentResponse::create($data);
                $registration_number = Auth::user()->registration_number;
                return redirect()->route('paymentSuccess');
                //return view('pages.payment-details', compact('registration_number', 'details'));


            } else if ($data['txnstatus'] == 'To') {
                $user->payment_status = 0;
                $data['status'] = 2;
                $data['user_id'] = $user->id;
                $user->save();
                Auth::login($user);
                PaymentResponse::create($data);
                $registration_number = Auth::user()->registration_number;

                return view('pages.payment-failed', compact('registration_number'));
                //return view('paymentfailed');

            } else {
                $data['user_id'] = $user->id;
                $data['status'] = 2;
                $user->payment_status = 2;
                Auth::login($user);
                PaymentResponse::create($data);
                $registration_number = Auth::user()->registration_number;

                return view('pages.payment-failed', compact('registration_number'));

            }


        } else {
            $registration_number = NULL;
            return view('pages.payment-failed', compact('registration_number'));
            //return redirect()->route('paymentfailed');
        }
        // $message = "Verified Transaction";


    }

    function get_encrypt($input)
    {
        define('AES_256_CBC', 'aes-256-cbc');
        $encryption_key = 'bJ5zs9YF5uc5GD8Ig3pg0vO8wZ7AE2WM';

        $iv = substr($encryption_key, 0, 16);
        $endata = $input;

        $encrypted = openssl_encrypt($endata, AES_256_CBC, $encryption_key, 0, $iv);
        $data = $encrypted;
        return $data;
    }

    function get_decrypt($respData)
    {

        $key = 'bJ5zs9YF5uc5GD8Ig3pg0vO8wZ7AE2WM';

        $iv = substr($key, 0, 16);


        $cipher = "aes-256-cbc";
        $decrypted = openssl_decrypt($respData, $cipher, $key, 0, $iv);
        return $decrypted;
    }

    public function paymentSuccess(Request $request)
    {
        return view('pages.paymentSuccess');
    }
}
