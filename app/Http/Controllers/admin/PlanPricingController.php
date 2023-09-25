<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\PricingPlan;
use App\Models\User;
use App\Models\Item;
use App\Models\Transaction;
use App\Helpers\helper;
use Stripe;
use Validator;
use Config;


class PlanPricingController extends Controller
{
    public function view_plan(Request $request)
    {
        $allplan = PricingPlan::orderBy('price');
        if (Auth::user()->type == 2) {
            $allplan = $allplan->where('is_available', '1');
        }
        $allplan = $allplan->get();
        return view('admin.plan.plan', compact("allplan"));
    }
    public function add_plan(Request $request)
    {
        return view('admin.plan.add_plan');
    }
    public function save_plan(Request $request)
    {
        $check = User::where('id', '1')->first();

        if ($request->plan_price > '0') {
            if ($check->license_type == "Regular License") {
                return redirect('admin/plan')->with('error', "Sorry, As per the License Policy you cannot charge your customers in Regular License. Please purchase Extended License to charge your customers.");
            }
        }
        
        $request->validate([
            'plan_name' => 'required',
            'plan_price' => 'required',
            'plan_duration' => 'required_if:type,1',
            'plan_max_business' => 'required_if:service_limit_type,1',
            'plan_description' => 'required',
            'plan_features' => 'required',
            'plan_appoinment_limit' => 'required_if:booking_limit_type,1',
            'plan_days' => 'required_if:type,2',
        ], [
            'plan_name.required' => trans('messages.name_required'),
            'plan_price.required' => trans('messages.price_required'),
            'plan_duration.required_if' => trans('messages.duration_required'),
            'plan_max_business.required_if' => trans('messages.plan_max_business'),
            'plan_description.required' => trans('messages.description_required'),
            'plan_features.required' => trans('messages.plan_features'),
            'plan_appoinment_limit.required_if' => trans('messages.appoinment_limit'),
            'plan_days.required_if' => trans('messages.days_required'),
            ]);
        if ($request->custom_domain == "on") {
            $custom_domain = 1;
        } else {
            $custom_domain = "2";
        }
        if ($request->vendor_app == "on") {
            $vendor_app = 1;
        } else {
            $vendor_app = "2";
        }
        if ($request->google_analytics == "on") {
            $google_analytics = 1;
        } else {
            $google_analytics = "2";
        }

        if ($request->coupons == "on") {
            $coupons = 1;
        } else {
            $coupons = "2";
        }

        if ($request->blogs == "on") {
            $blogs = 1;
        } else {
            $blogs = "2";
        }

        if ($request->social_logins == "on") {
            $social_logins = 1;
        } else {
            $social_logins = "2";
        }

        if ($request->sound_notification == "on") {
            $sound_notification = 1;
        } else {
            $sound_notification = "2";
        }

        if ($request->whatsapp_message == "on") {
            $whatsapp_message = 1;
        } else {
            $whatsapp_message = "2";
        }

        if ($request->telegram_message == "on") {
            $telegram_message = 1;
        } else {
            $telegram_message = "2";
        }

        if ($request->pos == "on") {
            $pos = 1;
        } else {
            $pos = "2";
        }

        if ($request->tableqr == "on") {
            $tableqr = 1;
        } else {
            $tableqr = "2";
        }

        $saveplan = new PricingPlan();
        $saveplan->name = $request->plan_name;
        $saveplan->themes_id = "0";
        $saveplan->description = $request->plan_description;
        $saveplan->features = implode("|", $request->plan_features);
        $saveplan->price = $request->plan_price;
        $saveplan->plan_type = $request->type;
        if ($request->type == "1") {
            $saveplan->duration = $request->plan_duration;
            $saveplan->days = "";
        }
        if ($request->type == "2") {
            $saveplan->duration = "";
            $saveplan->days = $request->plan_days;
        }
        if ($request->service_limit_type == "1") {
            $saveplan->order_limit = $request->plan_max_business;
        }
        elseif($request->service_limit_type == "2") {
            $saveplan->order_limit = -1;
        }
        if ($request->booking_limit_type == "1") {
            $saveplan->appointment_limit = $request->plan_appoinment_limit;
        }
        elseif($request->booking_limit_type == "2") {
            $saveplan->appointment_limit = -1;
        }
        $saveplan->custom_domain = $custom_domain;
        $saveplan->vendor_app = $vendor_app;
        $saveplan->google_analytics = $google_analytics;
        $saveplan->coupons = $coupons;
        $saveplan->blogs = $blogs;
        $saveplan->social_logins = $social_logins;
        $saveplan->sound_notification = $sound_notification;
        $saveplan->whatsapp_message = $whatsapp_message;
        $saveplan->telegram_message = $telegram_message;
        $saveplan->pos = $pos;
        $saveplan->tableqr = $tableqr;
        $saveplan->themes_id = implode(",", $request->themecheckbox);
        $saveplan->save();
        return redirect('admin/plan')->with('success', trans('messages.success'));
    }
    public function edit_plan($id)
    {
        $editplan = PricingPlan::where('id', $id)->first();
        return view('admin.plan.edit_plan', compact("editplan"));
    }
    public function update_plan(Request $request, $id)
    {
        $request->validate([
            'plan_name' => 'required',
            'plan_price' => 'required',
            'plan_duration' => 'required_if:type,1',
            'plan_max_business' => 'required_if:service_limit_type,1',
            'plan_description' => 'required',
            'plan_features' => 'required',
            'plan_appoinment_limit' => 'required_if:booking_limit_type,1',
            'plan_days' => 'required_if:type,2',
        ], [
            'plan_name.required' => trans('messages.name_required'),
            'plan_price.required' =>  trans('messages.price_required'),
            'plan_duration.required_if' => trans('messages.plan_duration'),
            'plan_max_business.required_if' => trans('messages.plan_max_business'),
            'plan_description.required' =>trans('messages.description_required'),
            'plan_features.required' => trans('messages.plan_features'),
            'plan_appoinment_limit.required_if' => trans('messages.appoinment_limit'),
            'plan_days.required_if' => trans('messages.days_required'),
        ]);
       
        if ($request->custom_domain == "on") {
            $custom_domain = 1;
        } else {
            $custom_domain = "2";
        }
        if ($request->google_analytics == "on") {
            $google_analytics = 1;
        } else {
            $google_analytics = "2";
        }
        if ($request->vendor_app == "on") {
            $vendor_app = 1;
        } else {
            $vendor_app = "2";
        }
        if ($request->coupons == "on") {
            $coupons = 1;
        } else {
            $coupons = "2";
        }
        if ($request->blogs == "on") {
            $blogs = 1;
        } else {
            $blogs = "2";
        }
        if ($request->social_logins == "on") {
            $social_logins = 1;
        } else {
            $social_logins = "2";
        }
        if ($request->sound_notification == "on") {
            $sound_notification = 1;
        } else {
            $sound_notification = "2";
        }
        if ($request->whatsapp_message == "on") {
            $whatsapp_message = 1;
        } else {
            $whatsapp_message = "2";
        }
        if ($request->telegram_message == "on") {
            $telegram_message = 1;
        } else {
            $telegram_message = "2";
        }
        if ($request->pos == "on") {
            $pos = 1;
        } else {
            $pos = "2";
        }
        if ($request->tableqr == "on") {
            $tableqr = 1;
        } else {
            $tableqr = "2";
        }
       
        $exitplan = PricingPlan::where('price', '0')->count();
        if ($exitplan > 1 && $request->plan_price == '0') {
            return redirect('admin/plan/edit-'.$id)->with('error', trans('messages.already_exist_plan'));
        }
        else
        {
            $editplan = PricingPlan::where('id', $id)->first();
            $editplan->name = $request->plan_name;
            $editplan->themes_id = "0";
            $editplan->description = $request->plan_description;
            $editplan->features = implode("|", $request->plan_features);
            $editplan->price = $request->plan_price;
            $editplan->plan_type = $request->type;
            if ($request->type == "1") {
                $editplan->duration = $request->plan_duration;
                $editplan->days = "";
            }
            if ($request->type == "2") {
                $editplan->duration = "";
                $editplan->days = $request->plan_days;
            }
            if ($request->service_limit_type == "1") {
                $editplan->order_limit = $request->plan_max_business;
            }
            elseif($request->service_limit_type == "2") {
                $editplan->order_limit = -1;
            }
            if ($request->booking_limit_type == "1") {
                $editplan->appointment_limit = $request->plan_appoinment_limit;
            }
            elseif($request->booking_limit_type == "2") {
                $editplan->appointment_limit = -1;
            }
            $editplan->custom_domain = $custom_domain;
            $editplan->google_analytics = $google_analytics;
            $editplan->vendor_app = $vendor_app;
            $editplan->coupons = $coupons;
            $editplan->blogs = $blogs;
            $editplan->social_logins = $social_logins;
            $editplan->sound_notification = $sound_notification;
            $editplan->whatsapp_message = $whatsapp_message;
            $editplan->telegram_message = $telegram_message;
            $editplan->pos = $pos;
            $editplan->tableqr = $tableqr;

            $editplan->themes_id = implode(",", $request->themecheckbox);
            $editplan->update();
            return redirect('admin/plan')->with('success', trans('messages.success'));
        }
    }
    public function status_change($id, $status)
    {
        PricingPlan::where('id', $id)->update(['is_available' => $status]);
        return redirect('admin/plan')->with('success', trans('messages.success'));
    }
    public function select_plan($id)
    {
        
        $plan = PricingPlan::where('id', $id)->first();
        $totalitem = Item::where('vendor_id', Auth::user()->id)->count();
        if (!empty($totalitem)) {
            if ($plan->order_limit != -1) {
                if ($plan->order_limit < $totalitem) {
                    return redirect('admin/plan')->with('error', trans('messages.not_eligible_for_plan'));
                }
            }
        }
        $checkbanktransfer = helper::checkplan(Auth::user()->id,'');
        $data = json_decode(json_encode($checkbanktransfer), true);
        if($data['original']['status'] == 2 && $data['original']['bank_transfer'] == 1)
        {
            return redirect('admin/plan')->with('error', $data['original']['message']);
        }
        if ($plan->price > 0) {
            $paymentmethod = Payment::whereNotIn('id', [1])->where('vendor_id','1')->where('is_available', '1')->where('is_activate',1)->get();
            return view('admin.plan.plan_payment', compact('plan', 'paymentmethod'));
        } else {
            $transaction = new transaction();
            $transaction->vendor_id = Auth::user()->id;
            $transaction->plan_name = $plan->name;
            $transaction->plan_id = $id;
            $transaction->payment_type = "";
            $transaction->payment_id = "";
            $transaction->amount = $plan->price;
            $transaction->service_limit = $plan->order_limit;
            $transaction->appoinment_limit = $plan->appointment_limit;
            $transaction->expire_date = helper::get_plan_exp_date($plan->duration, $plan->days);
            $transaction->duration = $plan->duration;
            $transaction->days = $plan->days;
            $transaction->purchase_date = date("Y-m-d h:i:sa");
            $transaction->duration = $plan->duration;
            $transaction->themes_id = $plan->themes_id;
            $transaction->custom_domain = $plan->custom_domain;
            $transaction->google_analytics = $plan->google_analytics;
            $transaction->vendor_app = $plan->vendor_app;
            $transaction->coupons = $plan->coupons;
            $transaction->blogs = $plan->blogs;
            $transaction->social_logins = $plan->social_logins;
            $transaction->sound_notification = $plan->sound_notification;
            $transaction->whatsapp_message = $plan->whatsapp_message;
            $transaction->telegram_message = $plan->telegram_message;
            $transaction->pos = $plan->pos;
            $transaction->tableqr = $plan->tableqr;
            $transaction->save();
            User::where('id', Auth::user()->id)->update(['plan_id' => $id, 'purchase_amount' => $plan->price, 'purchase_date' => Carbon::now()->toDateTimeString()]);
            $emaildata = helper::emailconfigration(helper::appdata('')->id);
            Config::set('mail', $emaildata);
            Helper::send_subscription_email(Auth::user()->email, Auth::user()->name, $plan->name, helper::get_plan_exp_date($plan->duration, $plan->days), helper::currency_formate($plan->price, ""), "-", "-");
            return redirect()->back()->with('success', trans('messages.success'));
        }
    }

  
    public function success(Request $request)
    {
        try {
            if (@$request->paymentId != "") {
                $paymentid = $request->paymentId;
            }
            if (@$request->payment_id != "") {
                $paymentid = $request->payment_id;
            }
            if (@$request->transaction_id != "") {
                $paymentid = $request->transaction_id;
            }

            $plan = PricingPlan::where('id', session()->get('plan_id'))->first();
            $checkuser = User::find(Auth::user()->id);
            $checkuser->plan_id = session()->get('plan_id');
            $checkuser->purchase_amount = session()->get('amount');
            $checkuser->purchase_date = date("Y-m-d h:i:sa");
            $checkuser->save();
            $transaction = new Transaction;
            $transaction->vendor_id = Auth::user()->id;
            $transaction->plan_name = $plan->name;
            $transaction->plan_id = session()->get('plan_id');
            $transaction->payment_type = session()->get('payment_type');
            $transaction->amount = session()->get('amount');
            $transaction->payment_id = @$paymentid;
            $transaction->service_limit = $plan->order_limit;
            $transaction->appoinment_limit = $plan->appointment_limit;
            $transaction->expire_date = helper::get_plan_exp_date($plan->duration, $plan->days);
            $transaction->duration = $plan->duration;
            $transaction->days = $plan->days;
            $transaction->custom_domain = $plan->custom_domain;
            $transaction->google_analytics = $plan->google_analytics;
            $transaction->vendor_app = $plan->vendor_app;
            $transaction->coupons = $plan->coupons;
            $transaction->blogs = $plan->blogs;
            $transaction->social_logins = $plan->social_logins;
            $transaction->sound_notification = $plan->sound_notification;
            $transaction->whatsapp_message = $plan->whatsapp_message;
            $transaction->telegram_message = $plan->telegram_message;
            $transaction->pos = $plan->pos;
            $transaction->tableqr = $plan->tableqr;
            $transaction->status = "2";
            $transaction->themes_id = $plan->themes_id;
            $transaction->purchase_date = date("Y-m-d h:i:sa");
            $transaction->save();
            if ($request->payment_type == "offline" || strtolower($request->payment_type) == "cod") {
                $payment_type = 1;
            }
            if (session()->get('payment_type') == 2) {
                $payment_type = "razorpay";
            }
            if (session()->get('payment_type') == 3) {
                $payment_type = "stripe";
            }
            if (session()->get('payment_type') == 5) {
                $payment_type = "paystack";
            }
            if (session()->get('payment_type') == 7) {
                $payment_type = "mercadopago";
            }
            if (session()->get('payment_type') == 8) {
                $payment_type = "paypal";
            }
            if (session()->get('payment_type') == 9) {
                $payment_type = "myfatoorah";
            }
            if (session()->get('payment_type') == 10) {
                $payment_type = "toyyibpay";
            }
            if (session()->get('payment_type') == 11) {
                $payment_type = "easycash";
            }
            if (session()->get('payment_type') == "banktransfer") {
                $payment_type = 'banktransfer';
            }

            $emaildata = helper::emailconfigration(helper::appdata('')->id);
            Config::set('mail', $emaildata);

            Helper::send_subscription_email(Auth::user()->email, Auth::user()->name, $plan->name, helper::get_plan_exp_date($plan->duration, $plan->days), helper::currency_formate($plan->price, ""), $payment_type, @$paymentid);

            session()->forget(['amount', 'plan_id', 'payment_type','currency','returnUrl','successurl','failureurl']);
            return redirect('admin/plan')->with('success', trans('messages.success'));
        } catch (\Throwable $th) {
            return $th;
        }
    }
    public function buyplan(Request $request)
    {
        try {
                $paymenttype= "";
                //payment_type = COD : 1,
                //  RazorPay : 2,
                // Stripe : 3,
                // Flutterwave : 4,
                // Paystack : 5,
                // Mercado Pago : 7,
                // PayPal : 8,
                // MyFatoorah : 9,
                // toyyibpay : 10
                // easycash : 11
                if($request->payment_type == "cod")
                {
                    $paymenttype = 1;
                }
                if($request->payment_type == "razorpay")
                {
                    $paymenttype = 2;
                }
                if($request->payment_type == "stripe")
                {
                    $paymenttype = 3;
                }
                if($request->payment_type == "flutterwave")
                {
                    $paymenttype = 4;
                }
                if($request->payment_type == "paystack")
                {
                    $paymenttype = 5;
                }
                if($request->payment_type == "easycash")
                {
                    $paymenttype = 11;
                }
                if($request->payment_type == "banktransfer")
                {
                    $paymenttype = 'banktransfer';
                }
             
            $plan = PricingPlan::where('id', $request->plan_id)->first();
            if ($request->payment_type == "stripe") {
                $paymentmethod = Payment::where('payment_name', $request->payment_type)->where('is_available', 1)->first();
                Stripe\Stripe::setApiKey($paymentmethod->secret_key);
                $charge = Stripe\Charge::create([
                    'amount' => $request->amount * 100,
                    'currency' => $request->currency,
                    'description' => 'Plan Subscription',
                    'source' => $request->payment_id,
                ]);
                $payment_id = $charge->id;
            } else {
                $payment_id = $request->payment_id;
            }
            if ($request->payment_type == 'banktransfer') {
                if ($request->hasFile('screenshot')) {
                    $validator = Validator::make($request->all(), [
                        'screenshot' => 'image|mimes:jpg,jpeg,png',
                    ], [
                        'screenshot.mage' => trans('messages.enter_image_file'),
                        'screenshot.mimes' => trans('messages.valid_image'),
                    ]);
                    if ($validator->fails()) {
                        return redirect()->back()->withErrors($validator)->withInput();
                    } else {
                        $filename = 'screenshot-' . uniqid() . "." . $request->file('screenshot')->getClientOriginalExtension();
                        $request->file('screenshot')->move(env('ASSETSPATHURL') . 'admin-assets/images/screenshot/', $filename);
                    }
                }
                $payment_id = "";
                $status = 1;
            } else {
                $status = 2;
            }
            $checkuser = User::find(Auth::user()->id);
            $checkuser->plan_id = $request->plan_id;
            $checkuser->purchase_amount = $request->amount;
            $checkuser->purchase_date = date("Y-m-d h:i:sa");
            $checkuser->save();
            $transaction = new Transaction();
            if ($request->payment_type == 'banktransfer') {
                $transaction->screenshot = $filename;
            }
            $transaction->vendor_id = Auth::user()->id;
            $transaction->plan_name = $plan->name;
            $transaction->plan_id = $request->plan_id;
            $transaction->payment_type = $paymenttype;
            $transaction->payment_id = $payment_id;
            $transaction->amount = $request->amount;
            $transaction->service_limit = $plan->order_limit;
            $transaction->appoinment_limit = $plan->appointment_limit;
            $transaction->status = $status;
            $transaction->purchase_date = date("Y-m-d h:i:sa");
            $transaction->expire_date = helper::get_plan_exp_date($plan->duration, $plan->days);
            $transaction->duration = $plan->duration;
            $transaction->days = $plan->days;
            $transaction->themes_id = $plan->themes_id;
            $transaction->custom_domain = $plan->custom_domain;
            $transaction->google_analytics = $plan->google_analytics;
            $transaction->vendor_app = $plan->vendor_app;
            $transaction->coupons = $plan->coupons;
            $transaction->blogs = $plan->blogs;
            $transaction->social_logins = $plan->social_logins;
            $transaction->sound_notification = $plan->sound_notification;
            $transaction->whatsapp_message = $plan->whatsapp_message;
            $transaction->telegram_message = $plan->telegram_message;
            $transaction->pos = $plan->pos;
            $transaction->tableqr = $plan->tableqr;
            $transaction->save();


            $emaildata = helper::emailconfigration(helper::appdata('')->id);
           
            Config::set('mail', $emaildata);

            if ($request->payment_type == 'banktransfer') {
                $admindata = User::select('name','email')->where('id','1')->first();
                helper::bank_transfer_request(Auth::user()->email, Auth::user()->name,$admindata->email, $admindata->name);
                return redirect('admin/plan')->with('success', trans('messages.success'));
            }else{
               
                helper::send_subscription_email(Auth::user()->email, Auth::user()->name, $plan->name, helper::get_plan_exp_date($plan->duration, $plan->days), helper::currency_formate($plan->price, ""), $request->payment_type, @$payment_id);
                return response()->json(['status' => 1, 'message' => trans('messages.success')], 200);
            }
        } catch (\Throwable $th) {
            if ($request->payment_type == 'banktransfer') {
                return redirect()->back()->with('error', trans('messages.wrong'));
            }else{
                return response()->json(['status' => 0, 'message' => trans('messages.wrong')], 200);
            }
        }
    }
    public function delete($id)
    {
        PricingPlan::where('id', $id)->delete();
        return redirect('admin/plan')->with('success', trans('messages.success'));
    }
}