<?php

namespace App\Http\Controllers\addons;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Session;

class EasyCashController extends Controller
{
    public $mfObj;
    /**
     * create MyFatoorah object
     */
    public function front_easycashrequest(Request $request)
    {
        // post
        // https://back.easykash.net/api/directpayv1/pay
        $authorization ;

        $amount = $request->amount;
        $currency ; // EGP USD SAR EUR
        $paymentOptions; // array  [1,2,3,4,5,6,8,9,12]
        $cashExpiry // int 3
        $name;
        $email;
        $mobile;
        $customerReference; //numbers only ordercode
        
        // response 
        // {
        //     "redirectUrl"="https://www.easykash.net/DirectPayV1/{productCode}"
        // }
        
        // post()




        // try {
            session()->put('amount', $request->amount);
            session()->put('plan_id', $request->plan_id);
            session()->put('payment_type', 11);
             //payment_type = COD : 1,RazorPay : 2, Stripe : 3, Flutterwave : 4, Paystack : 5, Mercado Pago : 7, PayPal : 8, MyFatoorah : 9, toyyibpay : 10
            session()->put('successurl', $request->successurl);
            session()->put('failureurl', $request->failureurl);
            $getkey = Payment::select('environment', 'secret_key')->where('payment_name', 'MyFatoorah')->where('vendor_id','1')->first();
            if ($getkey->environment == 0) {
                $mode = false;
            } else {
                $mode = true;
            }
            $this->mfObj = new PaymentMyfatoorahApiV2($getkey->secret_key, $getkey->currency, $mode);
            $paymentMethodId = 0; // 0 for MyFatoorah invoice or 1 for Knet in test mode
            $data            = $this->mfObj->getInvoiceURL($this->getPayLoadData(), $paymentMethodId);  
            return response()->json(['status' => 1, 'message' => trans('messages.success'), 'redirecturl' => $data['invoiceURL']], 200);
            // return response()->json(['IsSuccess' => 'true', 'Message' => 'Invoice created successfully.', 'Data' => $data]);
        // } catch (\Exception $e) {
        //     return response()->json(['status' => 0, 'message' => $e->getMessage()], 200);
        // }
    }
    
}
