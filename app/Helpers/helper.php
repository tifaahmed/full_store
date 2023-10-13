<?php

namespace App\Helpers;

use App\Models\Item;
use App\Models\Settings;
use App\Models\User;
use App\Models\Timing;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Transaction;
use App\Models\Payment;
use Session;
use App\Models\PricingPlan;
use App\Models\SystemAddons;
use App\Models\Cart;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use App\Models\Languages;
use Illuminate\Support\Str;
use App\Models\Footerfeatures;
use App;
use App\Models\City;
use Config;

class helper
{
    public static function app_static_data()
    {
        return Settings::first();
    }
    public static function appdata($vendor_id)
    {
        $host = $_SERVER['HTTP_HOST'];
        if ($host  ==  env('WEBSITE_HOST')) {
            $data = Settings::first();
            if (!empty($vendor_id)) {
                if (
                    Auth::user() &&  
                    ( Auth::user()->hasRole('admin') || Auth::user()->hasRole('super admin') )
                ) {
                    $data = Settings::first();
                }else{
                    $data = Settings::where('vendor_id', $vendor_id)->first();
                }
            }
        }
        // if the current host doesn't contain the website domain (meaning, custom domain)
        else {
            $data = Settings::where('custom_domain', $host)->first();
        }
        return $data;
    }

    // front
    public static function vendordata($id)
    {
        $data = User::where('id', $id)->where('is_available', 1)->first();
        return $data;
    }

    public static function image_path($image)
    {
        $path = asset('storage/app/public/images/not-found');
        if (Str::contains($image, 'nodata')) {
            $path = asset('storage/app/public/admin-assets/images/' . $image);
        }
        if (Str::contains($image, 'authformbgimage')) {
            $path = asset('storage/app/public/admin-assets/images/about/' . $image);
        }
        if (Str::contains($image, 'theme-')) {
            $path = asset('storage/app/public/admin-assets/images/theme/' . $image);
        }
        if (Str::contains($image, 'feature-')) {
            $path = asset('storage/app/public/admin-assets/images/feature/' . $image);
        }
        if (Str::contains($image, 'testimonial-')) {
            $path = asset('storage/app/public/admin-assets/images/testimonials/' . $image);
        }
        if (Str::contains($image, 'screenshot-')) {
            $path = asset('storage/app/public/admin-assets/images/screenshot/' . $image);
        }
        if (Str::contains($image, 'banktransfer') || Str::contains($image, 'cod') || Str::contains($image, 'razorpay') || Str::contains($image, 'stripe') || Str::contains($image, 'wallet') || Str::contains($image, 'flutterwave') || Str::contains($image, 'paystack') || Str::contains($image, 'mercadopago') || Str::contains($image, 'paypal') || Str::contains($image, 'myfatoorah') || Str::contains($image, 'toyyibpay') || Str::contains($image, 'payment')) {
            $path = asset('storage/app/public/admin-assets/images/about/payment/' . $image);
        }
        if (Str::contains($image, 'default')) {
            $path = asset('storage/app/public/admin-assets/images/about/' . $image);
        }
        if (Str::contains($image, 'logo')) {
            $path = asset('storage/app/public/admin-assets/images/about/logo/' . $image);
        }
        if (Str::contains($image, 'favicon')) {
            $path = asset('storage/app/public/admin-assets/images/about/favicon/' . $image);
        }
        if (Str::contains($image, 'og_image')) {
            $path = asset('storage/app/public/admin-assets/images/about/og_image/' . $image);
        }
        if (Str::contains($image, 'item-')) {
            $path = asset('storage/app/public/item/' . $image);
        }
        if (Str::contains($image, 'banner') || Str::contains($image, 'promotion-')) {
            $path = asset('storage/app/public/admin-assets/images/banners/' . $image);
        }
        if (Str::contains($image, 'order')) {
            $path = asset('storage/app/public/front/images/' . $image);
        }
        if (Str::contains($image, 'profile')) {
            $path = asset('storage/app/public/admin-assets/images/profile/' . $image);
        }
        if (Str::contains($image, 'category')) {
            $path = asset('storage/app/public/admin-assets/images/category/' . $image);
        }
        if (Str::contains($image, 'blog')) {
            $path = asset('storage/app/public/admin-assets/images/blog/' . $image);
        }
        if (Str::contains($image, 'flag')) {
            $path = asset('storage/app/public/admin-assets/images/language/' . $image);
        }
        if (Str::contains($image, 'cover')) {
            $path = asset('storage/app/public/admin-assets/images/coverimage/' . $image);
        }
        if (Str::contains($image, 'subscribe_bg')) {
            $path = asset('storage/app/public/admin-assets/images/subscribe/' . $image);
        }
        return $path;
    }
   
    public static function currency_formate($price, $vendor_id)
    {
        if (helper::appdata($vendor_id)->currency_position == "left") {
            return helper::appdata($vendor_id)->currency . number_format($price, 2);
        }
        if (helper::appdata($vendor_id)->currency_position == "right") {
            return number_format($price, 2) . helper::appdata($vendor_id)->currency;
        }
        return $price;
    }
    public static function vendortime($vendor)
    {
        date_default_timezone_set(helper::appdata($vendor)->timezone);
        $t = date('d-m-Y');
        $time = Timing::select('close_time')->where('vendor_id', $vendor)->where('day', date("l", strtotime($t)))->first();
        $txt = "Opened until " . date("D", strtotime($t)) . " " . $time->close_time . "";
        return $txt;
    }
    public static function date_format($date)
    {
        return date("j M Y", strtotime($date));
        // return date("j F Y",strtotime($date));
    }

    public static function get_city()
    {
        $city =  City::where('is_deleted','2')->where('is_available','1')->get();
        return $city;
    }

    public static function get_plan_exp_date($duration, $days)
    {
        date_default_timezone_set(helper::appdata('')->timezone);
        $purchasedate = date("Y-m-d h:i:sa");
        $exdate = "";
        if (!empty($duration) && $duration != "") {
            if ($duration == "1") {
                $exdate = date('Y-m-d', strtotime($purchasedate . ' + 30 days'));
            }
            if ($duration == "2") {
                $exdate = date('Y-m-d', strtotime($purchasedate . ' + 90 days'));
            }
            if ($duration == "3") {
                $exdate = date('Y-m-d', strtotime($purchasedate . ' + 180 days'));
            }
            if ($duration == "4") {
                $exdate = date('Y-m-d', strtotime($purchasedate . ' + 365 days'));
            }
            if ($duration == "5") {
                $exdate = "";
            }
        }
        if (!empty($days) && $days != "") {
            $exdate = date('Y-m-d', strtotime($purchasedate . ' + ' . $days . 'days'));
        }
        return $exdate;
    }
    public static function timings($vendor)
    {
        $host = $_SERVER['HTTP_HOST'];
        if ($host  ==  env('WEBSITE_HOST')) {
            $vdata = $vendor;
        }
        // if the current host doesn't contain the website domain (meaning, custom domain)
        else {
            $storeinfo = Settings::where('custom_domain', $host)->first();
            $vdata = $storeinfo->vendor_id;
        }
        $timings = Timing::where('vendor_id', @$vdata)->get();
        return $timings;
    }
    public static function storeinfo($vendor)
    {
        $vendorinfo = User::where('slug', $vendor)->first();
        return $vendorinfo;
    }

    public static function getcartcount($vendor_id, $user_id)
    {
        $host = $_SERVER['HTTP_HOST'];  
        if ($host  ==  env('WEBSITE_HOST')) {
            $vdata = $vendor_id;
        }
        // if the current host doesn't contain the website domain (meaning, custom domain)
        else {
            $storeinfo = Settings::where('custom_domain', $host)->first();
            $vdata = $storeinfo->vendor_id;
        }
        $session_id = Session::getId();

        if ($user_id != "" && Auth::user()->type == 3) {
            
            $cnt = Cart::where('vendor_id', $vdata)->where('user_id', $user_id)->count();
        } else {
            $cnt = Cart::where('vendor_id', $vdata)->where('session_id',$session_id)->count();
        }
      
        return $cnt;
    }


    public static function checkplan($id, $type)
    {        
        $check = SystemAddons::where('unique_identifier', 'subscription')->first();
        // if not activate subscription
        if (@$check->activated != 1) {
            return response()->json(['status' => 1, 'message' => '', 'expdate' => "", 'showclick' => "0", 'plan_message' => '', 'plan_date' => '', 'checklimit' => '','bank_transfer' => ''], 200);
        }
        $host = $_SERVER['HTTP_HOST'];     
        if ($host  ==  env('WEBSITE_HOST')) {
            date_default_timezone_set(helper::appdata($id)->timezone);
            $vendorinfo = User::where('id', $id)->first();
        }
        // if the current host doesn't contain the website domain (meaning, custom domain)
        else {
            $storeinfo = Settings::where('custom_domain', $host)->first();
            date_default_timezone_set(helper::appdata($storeinfo->vendor_id)->timezone);
            $vendorinfo = User::where('id', $storeinfo->vendor_id)->first();
        }
        $checkplan = Transaction::where('plan_id', $vendorinfo->plan_id)->where('vendor_id', $vendorinfo->id)->orderByDesc('id')->first();
        $totalservice = Item::where('vendor_id', $vendorinfo->id)->count();
        if ($vendorinfo->allow_without_subscription != 1) {
            if (!empty($checkplan)) {
                if ($vendorinfo->is_available == 2) {
                    return response()->json(['status' => 2, 'message' => trans('messages.account_blocked_by_admin'), 'showclick' => "0", 'plan_message' => '', 'plan_date' => '', 'checklimit' => '','bank_transfer' => ''], 200);
                }
                if ($checkplan->payment_type == 'banktransfer') {
                    if ($checkplan->status == 1) {
                        return response()->json(['status' => 2, 'message' => trans('messages.bank_request_pending'), 'showclick' => "0", 'plan_message' => trans('messages.bank_request_pending'), 'plan_date' => '', 'checklimit' => '','bank_transfer' => '1'], 200);
                    } elseif ($checkplan->status == 3) {
                        return response()->json(['status' => 2, 'message' => trans('messages.bank_request_rejected'), 'showclick' => "1", 'plan_message' => trans('messages.bank_request_rejected'), 'plan_date' => '', 'checklimit' => '','bank_transfer' => ''], 200);
                    }
                }
                if ($checkplan->expire_date != "") {
                    if (date('Y-m-d') > $checkplan->expire_date) {

                        return response()->json(['status' => 2, 'message' => trans('messages.plan_expired'), 'expdate' => $checkplan->expire_date, 'showclick' => "1", 'plan_message' => trans('messages.plan_expired'), 'plan_date' => $checkplan->expire_date, 'checklimit' => '','bank_transfer' => ''], 200);
                    }
                }
                if (Str::contains(request()->url(), 'admin')) {
                    if ($checkplan->service_limit != -1) {
                        if ($totalservice >= $checkplan->service_limit) {
                            if ( Auth::user()->hasRole('admin') || Auth::user()->hasRole('super admin')) {
                                return response()->json(['status' => 2, 'message' => trans('messages.products_limit_exceeded'), 'expdate' => '', 'showclick' => "1", 'plan_message' => trans('messages.plan_expires'), 'plan_date' => '', 'checklimit' => '','bank_transfer' => ''], 200);
                            }
                            if (Auth::user()->hasRole('store')) {
                                if ($checkplan->expire_date != "") {
                                    return response()->json(['status' => 2, 'message' => trans('messages.vendor_products_limit_message'), 'expdate' => '', 'showclick' => "1", 'plan_message' => trans('messages.plan_expires'), 'plan_date' => $checkplan->expire_date, 'checklimit' => 'service','bank_transfer' => ''], 200);
                                } else {
                                    return response()->json(['status' => 2, 'message' => trans('messages.vendor_products_limit_message'), 'expdate' => '', 'showclick' => "1", 'plan_message' => trans('messages.lifetime_subscription'), 'plan_date' => $checkplan->expire_date, 'checklimit' => 'service','bank_transfer' => ''], 200);
                                }
                            }
                        }
                    }
                    if ($checkplan->appoinment_limit != -1) {
                        if ($checkplan->appoinment_limit <= 0) {
                            if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('super admin')) {
                                return response()->json(['status' => 2, 'message' => trans('messages.order_limit_exceeded'), 'expdate' => '', 'showclick' => "1", 'plan_message' => trans('messages.plan_expires'), 'plan_date' => '', 'checklimit' => '','bank_transfer' => ''], 200);
                            }
                            if (Auth::user()->hasRole('store')) {
                                if ($checkplan->expire_date != "") {
                                    return response()->json(['status' => 2, 'message' => trans('messages.vendor_order_limit_message'), 'expdate' => '', 'showclick' => "1", 'plan_message' => trans('messages.plan_expires'), 'plan_date' => $checkplan->expire_date, 'checklimit' => 'booking','bank_transfer' => ''], 200);
                                } else {
                                    return response()->json(['status' => 2, 'message' => trans('messages.vendor_order_limit_message'), 'expdate' => '', 'showclick' => "1", 'plan_message' => trans('messages.lifetime_subscription'), 'plan_date' => $checkplan->expire_date, 'checklimit' => 'service','bank_transfer' => ''], 200);
                                }
                            }
                        }
                    }
                }
                if ($type == 3) {
                    if ($checkplan->appoinment_limit != -1) {
                        if ($checkplan->appoinment_limit <= 0) {
                            return response()->json(['status' => 2, 'message' => trans('messages.front_store_unavailable'), 'expdate' => '', 'showclick' => "1", 'plan_message' => trans('messages.plan_expires'), 'plan_date' => '', 'checklimit' => 'booking','bank_transfer' => ''], 200);
                        }
                    }
                }
                if ($checkplan->expire_date != "") {

                    return response()->json(['status' => 1, 'message' => trans('messages.plan_expires'), 'expdate' => $checkplan->expire_date, 'showclick' => "0", 'plan_message' => trans('messages.plan_expires'), 'plan_date' => $checkplan->expire_date, 'checklimit' => '','bank_transfer' => ''], 200);
                } else {

                    return response()->json(['status' => 1, 'message' => trans('messages.lifetime_subscription'), 'expdate' => $checkplan->expire_date, 'showclick' => "0", 'plan_message' => trans('messages.lifetime_subscription'), 'plan_date' => $checkplan->expire_date, 'checklimit' => '','bank_transfer' => ''], 200);
                }
            } else {
                if ( Auth::user()->hasRole('admin') || Auth::user()->hasRole('super admin')) {
                    return response()->json(['status' => 2, 'message' => trans('messages.doesnot_select_any_plan'), 'expdate' => '', 'showclick' => "0", 'plan_message' => '', 'plan_date' => '', 'checklimit' => '','bank_transfer' => ''], 200);
                }
                if (Auth::user()->hasRole('store')) {
                    return response()->json(['status' => 2, 'message' => trans('messages.vendor_plan_purchase_message'), 'expdate' => '', 'showclick' => "1", 'plan_message' => '', 'plan_date' => '', 'checklimit' => '','bank_transfer' => ''], 200);
                }
            }
        } else {
            return response()->json(['status' => 1, 'message' => trans('messages.success')], 200);
        }
    }

    public static function createorder($vendor,$user_id,$session_id,$payment_type_data, $payment_id, $customer_email, $customer_name, $customer_mobile, $stripeToken, $grand_total, $delivery_charge, $address=null, $building=null, $landmark=null,$block , $street , $house_num, $postal_code, $discount_amount, $sub_total, $tax, $delivery_time, $delivery_date, $delivery_area, $couponcode, $order_type, $notes , $table_id)
    {
        try {
            $host = $_SERVER['HTTP_HOST'];
            if ($host  ==  env('WEBSITE_HOST')) {
                $vendorinfo = helper::vendordata($vendor);
                $vdata = $vendor;
            }
            // if the current host doesn't contain the website domain (meaning, custom domain)
            else {
                $vendorinfo = Settings::where('custom_domain', $host)->first();
                
                $vdata = $vendorinfo->vendor_id;
            }
            date_default_timezone_set(helper::appdata($vdata)->timezone);
            

            if ($user_id != "" || $user_id !=null) {
                $data = Cart::where('user_id', $user_id)->where('vendor_id',$vdata)->get();
            } else {
                $data = Cart::where('session_id', $session_id)->where('vendor_id',$vdata)->get();
            }
            $order_number = substr(str_shuffle(str_repeat("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ", 10)), 0, 10);
            if($data->count() > 0)
            { 
                //payment_type = COD : 1,RazorPay : 2, Stripe : 3, Flutterwave : 4, Paystack : 5, Mercado Pago : 7, PayPal : 8, MyFatoorah : 9, toyyibpay : 10
                if (strtolower($payment_type_data) == "cod") {
                    $payment_type = 1;
                }
                if (strtolower($payment_type_data) == "razorpay") {
                    $payment_type = 2;
                }
                if (strtolower($payment_type_data) == "stripe") {
                    $payment_type = 3;
                }
                if (strtolower($payment_type_data) == "flutterwave") {
                    $payment_type = 4;
                }
                if (strtolower($payment_type_data) == "paystack") {
                    $payment_type = 5;
                }
                if (strtolower($payment_type_data) == "mercadopago") {
                    $payment_type = 7;
                }
                if (strtolower($payment_type_data) == "paypal") {
                    $payment_type = 8;
                }
                if (strtolower($payment_type_data) == "myfatoorah") {
                    $payment_type = 9;
                }
                if (strtolower($payment_type_data) == "toyyibpay") {
                    $payment_type = 10;
                }
               
                if ($order_type == "2") {
                    $delivery_charge = "0.00";
                    $address = "";
                    $building = "";
                    $landmark = "";
                    $postal_code = "";
                } else {
                    $delivery_charge = $delivery_charge;
                    $address = $address;
                    $building = $building;
                    $landmark = $landmark;
                    $block = $block;
                    $house_num = $house_num;
                    $street = $street;
                    $postal_code = $postal_code;
                }
                if ($discount_amount == "NaN") {
                    $discount_amount = 0;
                } else {
                    $discount_amount = $discount_amount;
                }
                
               
                $order = new Order;
                $order->vendor_id = $vdata;
                $order->user_id = $user_id;
                $order->order_number = $order_number;
                $order->payment_type = $payment_type;
                $order->payment_id = @$payment_id;
                $order->sub_total = $sub_total;
                $order->tax = $tax;
                $order->grand_total = $grand_total;
                $order->status = '1';
                $order->address = $address;
                $order->delivery_time = $delivery_time;
                $order->delivery_date = $delivery_date;
                $order->delivery_area = $delivery_area;
                $order->delivery_charge = $delivery_charge;
                $order->discount_amount = $discount_amount;
                $order->couponcode = $couponcode;
                $order->order_type = $order_type;
                $order->table_id = $table_id;
                $order->building = $building;
                $order->landmark = $landmark;
                $order->block = $block;
                $order->street = $street;
                $order->house_num = $house_num;
                $order->pincode = $postal_code;
                $order->customer_name = $customer_name;
                $order->customer_email = $customer_email;
                $order->mobile = $customer_mobile;
                $order->order_notes = $notes;
                $order->save();
                $order_id = DB::getPdo()->lastInsertId();

                foreach ($data as $value) {
                    
                    $OrderPro = new OrderDetails;
                    $OrderPro->order_id = $order_id;
                    $OrderPro->item_id = $value['item_id'];
                    $OrderPro->item_name = $value['item_name'];
                    $OrderPro->item_image = $value['item_image'];
                    $OrderPro->extras_id = $value['extras_id'];
                    $OrderPro->extras_name = $value['extras_name'];
                    $OrderPro->extras_price = $value['extras_price'];
                    if ($value['variants_id'] == "") {
                        $OrderPro->price = $value['item_price'];
                    } else {
                        $OrderPro->price = $value['price'];
                    }
                    $OrderPro->variants_id = $value['variants_id'];
                    $OrderPro->variants_name = $value['variants_name'];
                    $OrderPro->variants_price = $value['variants_price'];
                    $OrderPro->qty = $value['qty'];
                    $OrderPro->save();
                }
    
                if ($user_id != "" || $user_id !=null) {
                    $data = Cart::where('user_id', $user_id )->delete();
                } else {
                    $data = Cart::where('session_id', $session_id)->delete();
                }
                
                session()->forget(['offer_amount', 'offer_code', 'offer_type']);
    
                if ($user_id != "" || $user_id !=null) {
                    $count = Cart::where('user_id', $user_id)->count();
                } else {
                    $count = Cart::where('session_id', $session_id)->count();
                }
                
                session()->put('cart', $count);
                
                $trackurl = URL::to(@$vendorinfo->slug . '/track-order/' . $order_number);
                $emaildata = helper::emailconfigration($vdata);
                Config::set('mail',$emaildata);
                helper::create_order_invoice($customer_email, $customer_name, $vendorinfo->email, $vendorinfo->name, $order_number, $order_type, helper::date_format($delivery_date), $delivery_time, helper::currency_formate($grand_total, $vdata), $trackurl);
                
                $title = trans('labels.order_update');
                $body = "Congratulations! Your store just received a new order " . $order_number;
    
                helper::push_notification($vendorinfo->token, $title, $body, "order", $order->id);
    
                $checkplan = Transaction::where('vendor_id', $vdata)->orderByDesc('id')->first();
    
                if(!empty($checkplan)) {
                    if ($checkplan->appoinment_limit != -1) {
                        $checkplan->appoinment_limit -= 1;
                        $checkplan->save();
                    }
                }

                session()->forget('table_id');

                return $order_number;
            }
         else
         {
            return -1;
         }
           
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public static function get_plan($vendor_id)
    {
        $host = $_SERVER['HTTP_HOST'];
        if ($host  ==  env('WEBSITE_HOST')) {
            $vendorinfo = helper::storeinfo($vendor_id);
            $vdata = $vendor_id;
        }
        // if the current host doesn't contain the website domain (meaning, custom domain)
        else {
            $vendorinfo = Settings::where('custom_domain', $host)->first();
            $vdata = $vendorinfo->vendor_id;
        }
        $vendorinfo = Transaction::where('vendor_id', $vdata)->orderByDesc('id')->first();;
        return $vendorinfo;
    }

    public static function push_notification($token, $title, $body, $type, $order_id)
    {
        $customdata = array(
            "type" => $type,
            "order_id" => $order_id,
        );

        $msg = array(
            'body' => $body,
            'title' => $title,
            'sound' => 1/*Default sound*/
        );
        $fields = array(
            'to'           => $token,
            'notification' => $msg,
            'data' => $customdata
        );
        $headers = array(
            'Authorization: key=' . @helper::appdata('')->firebase,
            'Content-Type: application/json'
        );
        #Send Reponse To FireBase Server
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $firebaseresult = curl_exec($ch);
        curl_close($ch);

        return $firebaseresult;
    }

    public static function vendor_register($vendor_name, $vendor_email, $vendor_mobile, $vendor_password, $firebasetoken, $slug, $google_id, $facebook_id, $city_id, $area_id)
    {
        try {
           
            if (!empty($slug) || $slug != null) {
                $slug;
            } else {
                $check = User::where('slug', Str::slug($vendor_name, '-'))->first();
                if ($check != "") {
                    $last = User::select('id')->orderByDesc('id')->first();
                    $slug =   Str::slug($vendor_name . " " . ($last->id + 1), '-');
                } else {
                    $slug = Str::slug($vendor_name, '-');
                }
            }
            $rec = Settings::where('vendor_id', '1')->first();

            date_default_timezone_set($rec->timezone);
            $logintype = "normal";
            if ($google_id != "") {
                $logintype = "google";
            }

            if ($facebook_id != "") {
                $logintype = "facebook";
            }

            $user = new User;
            $user->name = $vendor_name;
            $user->email = $vendor_email;
            $user->password = $vendor_password;
            $user->google_id = $google_id;
            $user->facebook_id = $facebook_id;
            $user->mobile = $vendor_mobile;
            $user->image = "default.png";
            $user->slug = $slug;
            $user->login_type = $logintype;
            $user->type = 2;
            $user->token = $firebasetoken;
            $user->city_id = $city_id;
            $user->area_id = $area_id;
            $user->is_verified = 2;
            $user->is_available = 1;
            $user->save();

            $vendor_id = \DB::getPdo()->lastInsertId();

            $days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];

            foreach ($days as $day) {

                $timedata = new Timing;
                $timedata->vendor_id = $vendor_id;
                $timedata->day = $day;
                $timedata->open_time = '09:00 AM';
                $timedata->break_start = '01:00 PM';
                $timedata->break_end = '02:00 PM';
                $timedata->close_time = '09:00 PM';
                $timedata->is_always_close = '2';
                $timedata->save();
            }
            $paymentlist = Payment::select('payment_name', 'currency', 'image','is_activate')->where('vendor_id', '1')->where('id', "!=", "6")->get();
            foreach ($paymentlist as $payment) {
                $gateway = new Payment;
                $gateway->vendor_id = $vendor_id;
                $gateway->payment_name = $payment->payment_name;
                $gateway->currency = $payment->currency;
                $gateway->image = $payment->image;
                $gateway->public_key = '-';
                $gateway->secret_key = '-';
                $gateway->encryption_key = '-';
                $gateway->environment = '1';
                $gateway->is_available = '1';
                $gateway->is_activate = $payment->is_activate;
                $gateway->save();
            }

            $messagenotification = "Hi, 
I would like to place an order 👇
*{delivery_type}* Order No: {order_no}
---------------------------
{item_variable}
---------------------------
👉Subtotal : {sub_total}
👉Tax : {total_tax}
👉Delivery charge : {delivery_charge}
👉Discount : - {discount_amount}
---------------------------
📃 Total : {grand_total}
---------------------------
📄 Comment : {notes}

✅ Customer Info

Customer name : {customer_name}
Customer phone : {customer_mobile}

📍 Delivery Details

Address : {address}, {building}, {landmark}, {postal_code}

---------------------------
Date : {date}
Time : {time}
---------------------------
💳 Payment type :
{payment_type}

{store_name} will confirm your order upon receiving the message.

Track your order 👇
{track_order_url}

Click here for next order 👇
{store_url}";

            $data = new Settings;
            $data->vendor_id = $vendor_id;
            $data->currency = $rec->currency;
            $data->logo = "default.png";
            $data->favicon = "favicon_default.png";
            $data->og_image = "default-og_image.png";
            $data->banner = "default-banner.png";
            $data->currency_position = $rec->currency_position;
            $data->timezone = $rec->timezone;
            $data->address = "Your address";
            $data->contact = "Your contact";
            $data->email = "youremail@gmail.com";
            $data->description = "Your description";
            $data->copyright = $rec->copyright;
            $data->website_title = "Your store name";
            $data->meta_title = "Your store name";
            $data->meta_description = "Description";
            $data->facebook_link = "Your facebook page link";
            $data->linkedin_link = "Your linkedin page link";
            $data->instagram_link = "Your instagram page link";
            $data->twitter_link = "Your twitter page link";
            $data->delivery_type = "1,2";
            $data->item_message = "🔵 {qty} X {item_name} {variantsdata} - {item_price}";
            $data->interval_time = 1;
            $data->interval_type = 2;
            $data->primary_color = '#181D31';
            $data->secondary_color = '#6096B4';
            $data->whatsapp_message = $messagenotification;
            $data->telegram_message = $messagenotification;
            $data->save();

            return $vendor_id;
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public static function plandetail($plan_id)
    {
        $planinfo = PricingPlan::where('id', $plan_id)->first();
        return $planinfo;
    }

    public static function footer_features($vendor_id)
    {
        return FooterFeatures::select('id', 'icon', 'title', 'description')->where('vendor_id', $vendor_id)->get();
    }

    //Send email 

    public static function send_subscription_email($vendor_email, $vendor_name, $plan_name, $duration, $price, $payment_method, $transaction_id)
    {

        $admininfo = User::where('id', '1')->first();

        $data = ['title' => "Subscription Purchase Confirmation", 'vendor_email' => $vendor_email, 'vendor_name' => $vendor_name, 'admin_email' => $admininfo->email, 'admin_name' => $admininfo->name, 'plan_name' => $plan_name, 'duration' => $duration, 'price' => $price, 'payment_method' => $payment_method, 'transaction_id' => $transaction_id];

        $adminemail = ['title' => "New Subscription Purchase Notification", 'vendor_email' => $vendor_email, 'vendor_name' => $vendor_name, 'admin_email' => $admininfo->email, 'admin_name' => $admininfo->name, 'plan_name' => $plan_name, 'duration' => $duration, 'price' => $price, 'payment_method' => $payment_method, 'transaction_id' => $transaction_id];

        try {
            Mail::send('email.subscription', $data, function ($message) use ($data) {
                $message->to($data['vendor_email'])->subject($data['title']);
                
            });

            Mail::send('email.adminsubscription', $adminemail, function ($message) use ($adminemail) {
                $message->to($adminemail['admin_email'])->subject($adminemail['title']);
                
            });
            return 1;
        } catch (\Throwable $th) {
            return 0;
        }
    }

    public static function bank_transfer_request($vendor_email, $vendor_name, $admin_email, $admin_name)
    {
        $adminemail = ['title' => "Bank transfer", 'vendor_email' => $vendor_email, 'vendor_name' => $vendor_name, 'admin_email' => $admin_email, 'admin_name' => $admin_name];
        $data = ['title' => "Bank transfer", 'vendor_email' => $vendor_email, 'vendor_name' => $vendor_name, 'admin_email' => $admin_email, 'admin_name' => $admin_name];
        try {
            Mail::send('email.banktransfervendor', $data, function ($message) use ($data) {
                $message->to($data['vendor_email'])->subject($data['title']);
                
            });

            Mail::send('email.banktransferadmin', $adminemail, function ($message) use ($adminemail) {
                $message->to($adminemail['admin_email'])->subject($adminemail['title']);
                
            });
            return 1;
        } catch (\Throwable $th) {
            return 0;
        }
    }

    public static function subscription_rejected($vendor_email, $vendor_name, $plan_name, $payment_method)
    {
        $admindata = User::select('name', 'email')->where('id', '1')->first();
        $data = ['title' => "Bank transfer rejected", 'vendor_email' => $vendor_email, 'vendor_name' => $vendor_name, 'admin_email' => $admindata->email, 'admin_name' => $admindata->name, 'plan_name' => $plan_name, 'payment_method' => $payment_method];
        try {
            Mail::send('email.banktransferreject', $data, function ($message) use ($data) {
                $message->to($data['vendor_email'])->subject($data['title']);
                
            });
            return 1;
        } catch (\Throwable $th) {
            return 0;
        }
    }

    public static function vendor_contact_data($vendor_name, $vendor_email, $full_name, $useremail, $usermobile, $usermessage)
    {
        $data = ['title' => "Inquiry", 'vendor_name' => $vendor_name, 'vendor_email' => $vendor_email, 'full_name' => $full_name, 'useremail' => $useremail, 'usermobile' => $usermobile, 'usermessage' => $usermessage];
        try {
            Mail::send('email.vendorcontcatform', $data, function ($message) use ($data) {
                $message->to($data['vendor_email'])->subject($data['title']);
            });
            return 1;
        } catch (\Throwable $th) {
            return 0;
        }
    }

    public static function create_order_invoice($customer_email, $customer_name, $companyemail, $companyname, $order_number, $order_type, $delivery_date, $delivery_time, $grand_total, $trackurl)
    {
        $data = ['title' => "Order Invoice", 'order_type' => $order_type, 'customer_email' => $customer_email, 'customer_name' => $customer_name, 'company_email' => $companyemail, 'company_name' => $companyname, 'order_number' => $order_number, 'delivery_date' => $delivery_date, 'delivery_time' => $delivery_time, 'grand_total' => $grand_total, 'trackurl' => $trackurl];

        $vendordata = ['title' => "Order Invoice", 'order_type' => $order_type, 'customer_email' => $customer_email, 'customer_name' => $customer_name, 'company_email' => $companyemail, 'company_name' => $companyname, 'order_number' => $order_number, 'delivery_date' => $delivery_date, 'delivery_time' => $delivery_time, 'grand_total' => $grand_total, 'trackurl' => $trackurl];
        try {
            Mail::send('email.customerorderemail', $data, function ($message) use ($data) {
                $message->to($data['customer_email'])->subject($data['title']);     
            });

            Mail::send('email.vendororderemail', $vendordata, function ($companymessage) use ($vendordata) {
                $companymessage->to($vendordata['company_email'])->subject($vendordata['title']);
               
            });
            return 1;
        } catch (\Throwable $th) {
            return 0;
        }
    }

    public static function order_status_email($email, $name, $title, $message_text, $vendor_id)
    {
        $data = ['email' => $email, 'name' => $name, 'title' => $title, 'message_text' => $message_text,'logo' => helper::image_path(@helper::appdata($vendor_id)->logo)];
        try {
            Mail::send('email.orderemail', $data, function ($message) use ($data) {
                $message->to($data['email'])->subject($data['title']);
            });
            return 1;
        } catch (\Throwable $th) {
            return 0;
        }
    }

    public static function send_pass($email, $name, $password, $id)
    {
        $data = ['title' => "New Password", 'email' => $email, 'name' => $name, 'password' => $password, 'logo' => @helper::appdata($id)->logo];
        try {
            Mail::send('email.sendpassword', $data, function ($message) use ($data) {
                $message->to($data['email'])->subject($data['title']);

            });
            return 1;
        } catch (\Throwable $th) {
            return 0;
        }
    }
    // Email end

    public static function language()
    {
        if (session()->get('locale') == null) {
            $layout = Languages::select('name', 'layout', 'image', 'is_default', 'code')->where('is_default', 1)->first();

            App::setLocale($layout->code);
            session()->put('locale', $layout->code);
            session()->put('language', $layout->name);
            session()->put('flag', $layout->image);
            session()->put('direction', $layout->layout);
        } else {
            $layout = Languages::select('name', 'layout', 'image', 'is_default', 'code')->where('code', session()->get('locale'))->first();
            App::setLocale(session()->get('locale'));
            session()->put('locale', @$layout->code);
            session()->put('language', @$layout->name);
            session()->put('flag', @$layout->image);
            session()->put('direction', @$layout->layout);
        }
    }

    public static function listoflanguage()
    {
        $listoflanguage = Languages::where('is_available', '1')->get();
        return $listoflanguage;
    }
    public static function whatsappmessage($order_number, $vendor_slug, $vendordata)
    {
        $pagee[] ="";
        $orderdata = Order::where('order_number', $order_number)->first();
        $data = OrderDetails::where('order_id', $orderdata->id)->get();
            foreach ($data as $value) {
                if ($value['variants_id'] != "") {
                    $item_p = $value['qty'] * $value['variants_price'];
                    $variantsdata = '(' . $value['variants_name'] . ')';
                } else {
                    $variantsdata = "";
                    $item_p = $value['qty'] * $value['price'];
                }
                $extras_id = explode(",", $value['extras_id']);
                $extras_name = explode(",", $value['extras_name']);
                $extras_price = explode(",", $value['extras_price']);
                $item_message = helper::appdata($vendordata->id)->item_message;
                $itemvar = ["{qty}", "{item_name}", "{variantsdata}", "{item_price}"];
                $newitemvar = [$value['qty'], $value['item_name'], $variantsdata, helper::currency_formate($item_p, $vendordata->id)];
                $pagee[] = str_replace($itemvar, $newitemvar, $item_message);
                if ($value['extras_id'] != "") {
                    foreach ($extras_id as $key => $addons) {
                        @$pagee[] .= "👉" . $extras_name[$key] . ':' . helper::currency_formate($extras_price[$key], $vendordata->id) . '%0a';
                    }
                }
            }
            $items = implode(",", $pagee);
        
      
        $itemlist = str_replace(',', '%0a', $items);
        if ($orderdata->order_type == 1) {
            $order_type = trans('labels.delivery');
        } else {
            $order_type = trans('labels.pickup');
        }
        //payment_type = COD : 1,RazorPay : 2, Stripe : 3, Flutterwave : 4, Paystack : 5, Mercado Pago : 7, PayPal : 8, MyFatoorah : 9, toyyibpay : 10
        if ($orderdata->payment_type == 1) {
            $payment_type = trans('labels.cod');
        }
        if ($orderdata->payment_type == 2) {
            $payment_type = trans('labels.razorpay');
        }
        if ($orderdata->payment_type == 3) {
            $payment_type = trans('labels.stripe');
        }
        if ($orderdata->payment_type == 4) {
            $payment_type = trans('labels.flutterwave');
        }
        if ($orderdata->payment_type == 5) {
            $payment_type = trans('labels.paystack');
        }
        if ($orderdata->payment_type == 7) {
            $payment_type = trans('labels.mercadopago');
        }
        if ($orderdata->payment_type == 8) {
            $payment_type = trans('labels.paypal');
        }
        if ($orderdata->payment_type == 9) {
            $payment_type = trans('labels.myfatoorah');
        }
        if ($orderdata->payment_type == 10) {
            $payment_type = trans('labels.toyyibpay');
        }
        $var = ["{delivery_type}", "{order_no}", "{item_variable}", "{sub_total}", "{total_tax}", "{delivery_charge}", "{discount_amount}", "{grand_total}", "{notes}", "{customer_name}", "{customer_mobile}", "{address}", "{building}", "{landmark}", "{postal_code}", "{date}", "{time}", "{payment_type}", "{store_name}", "{track_order_url}", "{store_url}"];
        $newvar = [$order_type, $order_number, $itemlist, helper::currency_formate($orderdata->sub_total, $vendordata->id), helper::currency_formate($orderdata->tax, $vendordata->id), helper::currency_formate($orderdata->delivery_charge, $vendordata->id), helper::currency_formate($orderdata->discount_amount, $vendordata->id), helper::currency_formate($orderdata->grand_total, $vendordata->id), $orderdata->order_notes, $orderdata->customer_name, $orderdata->mobile, $orderdata->address, $orderdata->building, $orderdata->landmark, $orderdata->postal_code, $orderdata->delivery_date, $orderdata->delivery_time, $payment_type, $vendordata->name, URL::to($vendordata->slug . "/track-order/" . $order_number), URL::to($vendordata->slug)];
        $whmessage = str_replace($var, $newvar, str_replace("\n", "%0a", helper::appdata($vendordata->id)->whatsapp_message));
        
        return $whmessage;
        
    }

    // dynamic email configration
    public static function emailconfigration($vendor_id)
    {
        $host = $_SERVER['HTTP_HOST'];
        if ($host  ==  env('WEBSITE_HOST')) {
            $vdata = $vendor_id;
        }
        // if the current host doesn't contain the website domain (meaning, custom domain)
        else {
            $storeinfo = Settings::where('custom_domain', $host)->first();
            $vdata = $storeinfo->vendor_id;
        }

        $mailsettings = Settings::where('vendor_id', $vdata)->first();
        if ($mailsettings) {
            $emaildata = [
                'driver' => $mailsettings->mail_driver,
                'host' => $mailsettings->mail_host,
                'port' => $mailsettings->mail_port,
                'encryption' => $mailsettings->mail_encryption,
                'username' => $mailsettings->mail_username,
                'password' => $mailsettings->mail_password,
                'from'     => ['address' => $mailsettings->mail_fromaddress, 'name' => $mailsettings->mail_fromname]
            ];
        }
        return $emaildata;
    }
}
