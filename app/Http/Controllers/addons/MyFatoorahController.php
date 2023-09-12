<?php

namespace App\Http\Controllers\addons;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use MyFatoorah\Library\PaymentMyfatoorahApiV2;
use Illuminate\Support\Facades\Auth;
use Session;
class MyFatoorahController extends Controller
{
    public $mfObj;
    /**
     * create MyFatoorah object
     */
    public function myfatoorahrequest(Request $request)
    {
        try {
            session()->put('amount', $request->amount);
            session()->put('plan_id', $request->plan_id);
            session()->put('payment_type', 9);
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
        } catch (\Exception $e) {
            return response()->json(['status' => 0, 'message' => $e->getMessage()], 200);
        }
    }
    
    /**
     * 
     * @param int|string $orderId
     * @return array
     */
    private function getPayLoadData($orderId = null) {
        return [
            'CustomerName'       => Auth::user()->name,
            'InvoiceValue'       => session()->get('amount'),
            'DisplayCurrencyIso' => 'KWD',
            'CustomerEmail'      => Auth::user()->email,
            'CallBackUrl'        => session()->get('successurl'),
            'ErrorUrl'           => session()->get('failureurl'),
            'MobileCountryCode'  => '+965',
            'CustomerMobile'     => '12345678',
            'Language'           => 'en',
            'CustomerReference'  => $orderId,
            'SourceInfo'         => 'Laravel ' . app()::VERSION . ' - MyFatoorah Package ' . MYFATOORAH_LARAVEL_PACKAGE_VERSION
        ];
    }

    /**
     * Get MyFatoorah payment information
     * 
     * @return \Illuminate\Http\Response
     */
    public function callback() {
        try {
            $data = $this->mfObj->getPaymentStatus(request('paymentId'), 'PaymentId');

            if ($data->InvoiceStatus == 'Paid') {
                $msg = 'Invoice is paid.';
            } else if ($data->InvoiceStatus == 'Failed') {
                $msg = 'Invoice is not paid due to ' . $data->InvoiceError;
            } else if ($data->InvoiceStatus == 'Expired') {
                $msg = 'Invoice is expired.';
            }
            
            return response()->json(['IsSuccess' => 'true', 'Message' => $msg, 'Data' => $data]);
        } catch (\Exception $e) {
            return response()->json(['IsSuccess' => 'false', 'Message' => $e->getMessage()]);
        }
    }

    // front-----------------------------------------------
    /**
     * create MyFatoorah object
     */
    public function front_myfatoorahrequest(Request $request)
    {
        try {
            Session::put('sub_total', $request->sub_total);
            Session::put('tax', $request->tax);
            Session::put('grand_total', $request->grand_total);
            Session::put('delivery_time', $request->delivery_time);
            Session::put('delivery_date', $request->delivery_date);
            Session::put('delivery_area', $request->delivery_area);
            Session::put('delivery_charge', $request->delivery_charge);
            Session::put('discount_amount', $request->discount_amount);
            Session::put('couponcode', $request->couponcode);
            Session::put('order_type', $request->order_type);
            Session::put('address', $request->address);
            Session::put('postal_code', $request->postal_code);
            Session::put('building', $request->building);
            Session::put('landmark', $request->landmark);
            Session::put('notes', $request->notes);
            Session::put('customer_name', $request->customer_name);
            Session::put('customer_email', $request->customer_email);
            Session::put('customer_mobile', $request->customer_mobile);
            Session::put('vendor_id', $request->vendor_id);
            Session::put('payment_type', $request->payment_type);
            Session::put('slug', $request->slug);
            Session::put('successurl', $request->url);
            Session::put('failureurl', $request->failure);
            Session::put('table', $request->table);
            $getkey = Payment::select('environment', 'secret_key', 'currency')->where('payment_name', 'MyFatoorah')->where('vendor_id', $request->vendor_id)->first();
         
            if ($getkey->environment == 0) {
                $mode = false;
            } else {
                $mode = true;
            }
            $this->mfObj = new PaymentMyfatoorahApiV2($getkey->secret_key, $getkey->currency, $mode);
            $paymentMethodId = 0; // 0 for MyFatoorah invoice or 1 for Knet in test mode
            $data = $this->mfObj->getInvoiceURL($this->front_getPayLoadData(), $paymentMethodId);
            return response()->json(['status' => 1, 'message' => trans('messages.success'), 'url' => $data['invoiceURL']], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => 0, 'message' => $e->getMessage()], 200);
        }
    }
   
    /**
     * 
     * @param int|string $orderId
     * @return array
     */
    private function front_getPayLoadData($orderId = null)
    {
        return [
            'CustomerName'       => Session::get('customer_name'),
            'InvoiceValue'       => session()->get('grand_total'),
            'DisplayCurrencyIso' => 'KWD',
            'CustomerEmail'      => Session::get('customer_email'),
            'CallBackUrl'        => session()->get('successurl'),
            'ErrorUrl'           => session()->get('failureurl'),
            'MobileCountryCode'  => '+965',
            'CustomerMobile'     => '12345678',
            'Language'           => 'en',
            'CustomerReference'  => $orderId,
            'SourceInfo'         => 'Laravel ' . app()::VERSION . ' - MyFatoorah Package ' . MYFATOORAH_LARAVEL_PACKAGE_VERSION
        ];
    }
}
