<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\helper;
use App\Models\Areas;
use App\Models\User;
use App\Models\Settings;
use App\Models\Transaction;
use App\Models\PricingPlan;
use App\Models\Country;
use App\Models\City;
use App\Models\CustomDomain;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\SystemAddons;
use Config;
use Lunaweb\RecaptchaV3\Facades\RecaptchaV3;

class VendorController extends Controller
{
    public function index(Request $request)
    {
        $getuserslist = User::where('type', 2)->orderBydesc('id')->get();
        return view('admin.user.index', compact('getuserslist'));
    }
    public function add(Request $request)
    {
        $cities = City::where('Is_deleted', 2)->where('is_available', 1)->get();
        return view('admin.user.add', compact('cities'));
    }
    public function edit($slug)
    {
        $getuserdata = User::where('slug', $slug)->first();
        $getplanlist = PricingPlan::where('is_available', 1)->get();
        $cities = City::where('Is_deleted', 2)->where('is_available', 1)->get();
        return view('admin.user.edit', compact('getuserdata', 'getplanlist', 'cities'));
    }
    public function update(Request $request)
    {
        $edituser = User::where('slug', $request->slug)->first();
       
        $edituser->name = $request->name;
        $edituser->email = $request->email;
        $edituser->mobile = $request->mobile;
        $edituser->city_id = $request->city;
        $edituser->area_id = $request->area;
        if ($request->has('profile')) {
           
            if (Auth::user()->image != "default.png" && file_exists(storage_path('app/public/admin-assets/images/profile/' . Auth::user()->image))) {
                unlink(storage_path('app/public/admin-assets/images/profile/' . Auth::user()->image));
            }
            $edit_image = $request->file('profile');
            $profileImage = 'profile-' . uniqid() . "." . $edit_image->getClientOriginalExtension();
            $edit_image->move(storage_path('app/public/admin-assets/images/profile/'), $profileImage);
            $edituser->image = $profileImage;
        }
        if (!isset($request->allow_store_subscription)) {
            if ($request->plan != null && !empty($request->plan)) {
                $plan = PricingPlan::where('id', $request->plan)->first();
                $edituser->plan_id = $plan->id;
                $edituser->purchase_amount = $plan->price;
                $edituser->purchase_date = date("Y-m-d h:i:sa");
                $transaction = new transaction();
                $transaction->vendor_id = $edituser->id;
                $transaction->plan_id = $plan->id;
                $transaction->plan_name = $plan->name;
                $transaction->payment_type = "offline";
                $transaction->payment_id = "";
                $transaction->amount = $plan->price;
                $transaction->service_limit = $plan->order_limit;
                $transaction->appoinment_limit = $plan->appointment_limit;
                $transaction->status = 2;
                $transaction->purchase_date = date("Y-m-d h:i:sa");
                $transaction->expire_date = helper::get_plan_exp_date($plan->duration, $plan->days);
                $transaction->duration = $plan->duration;
                $transaction->days = $plan->days;
                $transaction->custom_domain = $plan->custom_domain;
                $transaction->themes_id = $plan->themes_id;
                $transaction->save();
                if ($plan->custom_domain == "2") {
                    Settings::where('vendor_id', Auth::user()->id)->update(['custom_domain' => "-"]);
                }
                if ($plan->custom_domain == "1") {
                    $checkdomain = CustomDomain::where('vendor_id', Auth::user()->id)->first();
                    if (@$checkdomain->status == 2) {
                        Settings::where('vendor_id', Auth::user()->id)->update(['custom_domain' => $checkdomain->current_domain]);
                    }
                }
            }
        }
        if (Str::contains(request()->url(), 'user')) {
            if (isset($request->allow_store_subscription)) {
                $edituser->plan_id = "";
                $edituser->purchase_amount = "";
                $edituser->purchase_date = "";
            }
            $edituser->allow_without_subscription = isset($request->allow_store_subscription) ? 1 : 2;
            $edituser->available_on_landing = isset($request->show_landing_page) ? 1 : 2;
        }
        $edituser->update();
        if ($request->has('updateprofile') && $request->updateprofile == 1) {
            return redirect('admin/settings')->with('success', trans('messages.success'));
        } else {
            return redirect('admin/users')->with('success', trans('messages.success'));
        }
    }
    public function status(Request $request)
    {
        User::where('slug', $request->slug)->update(['is_available' => $request->status]);
        return redirect('admin/users')->with('success', trans('messages.success'));
    }
    public function vendor_login(Request $request)
    {
        $user = User::where('slug', $request->slug)->first();
        session()->put('vendor_login', 1);
        Auth::login($user);
        return redirect('admin/dashboard');
    }
    public function admin_back(Request $request)
    {
        $getuser = User::where('type', '1')->first();
        Auth::login($getuser);
        session()->forget('vendor_login');
        return redirect('admin/users');
    }
    // ------------------------------------------------------------------------
    // ----------------- registration & Auth pages ----------------------------
    // ------------------------------------------------------------------------
    public function register()
    {
        Helper::language();
        $cities = City::where('Is_deleted', 2)->where('is_available', 1)->get();
        return view('admin.auth.register', compact('cities'));
    }

    public function register_vendor(Request $request)
    {

        $vendor_count = User::where('type', 2)->count();
        if (
            $vendor_count == 0 || SystemAddons::where('unique_identifier', 'subscription')->first() != null &&
            SystemAddons::where('unique_identifier', 'subscription')->first()->activated == 1
        ) {
            $request->validate([
                'email' => 'unique:users,email',
                'mobile' => 'unique:users,mobile',
            ], [
                'email.unique' => trans('messages.unique_email_required'),
                'mobile.unique' => trans('messages.unique_mobile_required'),
            ]);


            if(session()->has('social_login')){
                if(session()->get('social_login')['google_id'] != ""){
                    $login_type = "google";
                    $google_id = session()->get('social_login')['google_id'];
                    $email = session()->get('social_login')['email'];
                }
                if(session()->get('social_login')['facebook_id'] != ""){
                    $login_type = "facebook";
                    $facebook_id = session()->get('social_login')['facebook_id'];
                    $email = session()->get('social_login')['email'];
                }
            }else{
               
                $email = $request->email;
               
                $login_type = "email";
                $password = Hash::make($request->password);
            }

            if (@Auth::user() && @Auth::user()->type != 1) {
                if (helper::appdata('')->recaptcha_version == 'v2') {
                    $request->validate([
                        'g-recaptcha-response' => 'required'
                    ], [
                        'g-recaptcha-response.required' => 'The g-recaptcha-response field is required.'
                    ]);
                }

                if (helper::appdata('')->recaptcha_version == 'v3') {
                    $score = RecaptchaV3::verify($request->get('g-recaptcha-response'), 'contact');
                    if($score <= helper::appdata('')->score_threshold) {
                        return redirect()->back()->with('error','You are most likely a bot');
                    }
                }
            }
            
            $data = helper::vendor_register($request->name, $email, $request->mobile, $password, '', $request->slug, '', '', $request->city, $request->area);
            $newuser = User::select('id', 'name', 'email', 'mobile', 'image')->where('id', $data)->first();
            $newuser->syncRoles('store');

            if (@Auth::user() && @Auth::user()->type == 1) {
                return redirect('admin/users')->with('success', trans('messages.success'));
            } else {
                Auth::login($newuser);
                session()->put('vendor_login', 1);
                return redirect('admin/dashboard')->with('success', trans('messages.success'));
            }
        } else {
            return redirect('admin/users')->with('error', 'You can use the script for only a single client or yourself in regular license. Purchase extended license to use the script as saas version');
        }
    }
    public function forgot_password()
    {
        Helper::language();
        return view('admin.auth.forgotpassword');
    }
    public function send_password(Request $request)
    {
        
        $checkuser = User::where('email', $request->email)->where('is_available', 1)->whereIn('type',[1,2])->first();
        if (!empty($checkuser)) {
            $password = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 1, 6);
            $emaildata = helper::emailconfigration(helper::appdata('')->id);
            Config::set('mail', $emaildata);
            $pass = Helper::send_pass($request->email, $checkuser->name, $password, '1');
            if ($pass == 1) {
                $checkuser->password = Hash::make($password);
                $checkuser->save();
                return redirect('admin')->with('success', trans('messages.success'));
            } else {
                return redirect('admin/forgot_password')->with('error', trans('messages.wrong'));
            }
        } else {
            return redirect()->back()->with('error', trans('messages.invalid_user'));
        }
    }
    public function change_password(Request $request)
    {
        
        if (Hash::check($request->current_password, Auth::user()->password)) {
            if ($request->current_password == $request->new_password) {
                return redirect()->back()->with('error', trans('messages.new_old_password_diffrent'));
            } else {
                if ($request->new_password == $request->confirm_password) {
                    $changepassword = User::where('id', Auth::user()->id)->first();
                    $changepassword->password = Hash::make($request->new_password);
                    $changepassword->update();

                    $emaildata = helper::emailconfigration(helper::appdata("")->id);
                    Config::set('mail', $emaildata);
                    helper::send_pass($changepassword->email, $changepassword->name, $request->new_password, helper::appdata("")->logo);


                    return redirect()->back()->with('success', trans('messages.success'));
                } else {
                    return redirect()->back()->with('error', trans('messages.new_confirm_password_inccorect'));
                }
            }
        } else {
            return redirect()->back()->with('error', trans('messages.old_password_incorect'));
        }
    }

    public function is_allow(Request $request)
    {
        $status = User::where('id', $request->id)->update(['allow_without_subscription' => $request->status]);
        if ($status) {
            return 1;
        } else {
            return 0;
        }
    }
  
    public function getarea(Request $request)
    {
        try {
            $data['area'] = Areas::select("id", "area")->where('city_id', $request->city)->where('is_available', 1)->where('is_deleted', 2)->get();
            return response()->json($data);
        } catch (\Throwable $th) {
            return response()->json(['status' => 0, 'message' => trans('messages.wrong')], 200);
        }
    }
}
