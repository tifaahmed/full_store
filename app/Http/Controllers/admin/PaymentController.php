<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
class PaymentController extends Controller
{
    public function index(){
       //if vendor
        // if (Auth::user()->type == 2) { 
            $getpayment = Payment::where('payment_name','!=','wallet')
            ->where('vendor_id',Auth::user()->id)->where('is_activate',1)->get();
        // } 
        //if admin
        // else {
        //     $getpayment = Payment::where('payment_name','!=','wallet')
        //     ->where('vendor_id','1')->where('is_activate',1)->get();
        // }
        return view('admin.payment.payment',compact("getpayment"));
    }
    public function update(Request $request)
    {
        $data = Payment::where('vendor_id',Auth::user()->id)
        ->where('id',$request->transaction_type)->first();
        if (!$data) {
            return redirect()->back()->with('error', trans('messages.wrong'));
        }
        $data->is_available = $request->is_available ? $request->is_available : 2;
        $data->environment = $request->environment != "" ? $request->environment : "";
        $data->public_key = $request->public_key != "" ? $request->public_key : "";
        $data->secret_key = $request->secret_key != "" ? $request->secret_key : "";
        $data->currency = $request->currency != "" ? $request->currency : "";


            if(strtolower($data->payment_name) == 'flutterwave'){
                $data->encryption_key = $request->encryption_key;
            }else{
                $data->encryption_key = "";
            }

            if($request->image)
            {
                if($data->image != strtolower($data->payment_name).".png" && file_exists(env('ASSETSPATHURL') . 'admin-assets/images/about/payment/'.$data->image)){
                    unlink(env('ASSETSPATHURL') . 'admin-assets/images/about/payment/'.$data->image);
                }
                $image = 'payment-' . uniqid() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(env('ASSETSPATHURL') . 'admin-assets/images/about/payment/', $image);
                $data->image = $image;
            }

            $data->save();
        
        if (Auth::user()->type == 1) {
            $pay_data = Payment::where('payment_name', 'Banktransfer')->where('vendor_id',1)->first();
            $pay_data->bank_name = $request->bank_name;
            $pay_data->account_holder_name = $request->account_holder_name;
            $pay_data->account_number = $request->account_number;
            $pay_data->bank_ifsc_code = $request->bank_ifsc_code;
            $pay_data->save();
        }

        
        return redirect()->back()->with('success', trans('messages.success'));
    }
}
