<?php
namespace App\Http\Controllers\landing;

use App\Helpers\helper;
use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Areas;
use App\Models\Blog;
use App\Models\City;
use App\Models\Contact;
use App\Models\Country;
use App\Models\Faq;
use App\Models\Features;
use Illuminate\Http\Request;
use App\Models\PricingPlan;
use App\Models\Privacypolicy;
use App\Models\Promotionalbanner;
use App\Models\RefundPrivacypolicy;
use App\Models\Subscriber;
use App\Models\SystemAddons;
use App\Models\Terms;
use App\Models\Testimonials;
use App\Models\User;
use Config;
use Lunaweb\RecaptchaV3\Facades\RecaptchaV3;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $planlist = PricingPlan::orderBy('price')->get();
        $features = Features::where('vendor_id','1')->orderBy('id')->get();
        $testimonials = Testimonials::where('vendor_id','1')->get();
        $blogs = Blog::where('vendor_id','1')->get();
        $userdata = User::select('users.id','name','slug','settings.description','website_title','cover_image')->where('available_on_landing',1)->join('settings','users.id', '=', 'settings.vendor_id')->get();
        
        return view('landing.index',compact('planlist','features','testimonials','blogs','userdata'));
    }

    public function emailsubscribe(Request $request)
    {  
        try {
            $subscribe= new Subscriber;
            $subscribe->vendor_id = '1';
            $subscribe->email = $request->email;
            $subscribe->save();
            return redirect()->back()->with('success',trans('messages.success'));
        } catch (\Throwable $th) {  
            return redirect()->back()->with('error',trans('messages.wrong'));
        }    
    }

    public function inquiry(Request $request)
    {
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

        $newinquiry = new Contact;
        $newinquiry->vendor_id = '1';
        $newinquiry->name = $request->first_name . " " . $request->last_name;
        $newinquiry->email = $request->emaill;
        $newinquiry->mobile = $request->mobile;
        $newinquiry->message = $request->message; 
        $newinquiry->save();
        $vendordata = User::where('id', 1)->first();
        $emaildata = helper::emailconfigration($vendordata->id);
        Config::set('mail', $emaildata);
        helper::vendor_contact_data($vendordata->name,$vendordata->email,$request->name,$request->email,$request->mobile,$request->message);
        return redirect()->back()->with('success',trans('messages.success'));
    }

    public function blogs(Request $request)
    {
        $blogs = Blog::where('vendor_id','1')->get();
        return view('landing.blog_list',compact('blogs'));
    }

    public function privacy_policy(Request $request)
    {
        $privacy_policy = Privacypolicy::where('vendor_id','1')->first();
        return view('landing.privacy_policy',compact('privacy_policy'));
    }

    public function about_us(Request $request)
    {
        $about_us = About::where('vendor_id','1')->first();
       
        return view('landing.about_us',compact('about_us'));
    }

    public function refund_policy(Request $request)
    {
        $refund_policy = RefundPrivacypolicy::where('vendor_id','1')->first();
        return view('landing.refund_policy',compact('refund_policy'));
    }
    
    public function terms_condition(Request $request)
    {
        $terms_condition = Terms::where('vendor_id','1')->first();
        return view('landing.terms_condition',compact('terms_condition'));
    }
    
    public function allstores(Request $request)
    {
       
        $cities = City::where('is_deleted',2)->where('is_available',1)->get();
        $banners = Promotionalbanner::with('vendor_info')->get();
        if($request->country =="" && $request->city =="")
        {
            $stores = User::where('type',2);
        }
        $city_name = "";
        if($request->has('city') && $request->city !="")
        {
            $city = City::select('id')->where('name',$request->city)->first();
            $stores = User::where('type',2)->where('city_id',$city->id);
        }
        if($request->has('area') && $request->area !="")
        {
            $area = Areas::where('area',$request->area)->first();
            $stores = User::where('type',2)->where('area_id',$area->id);
            $area_name = $area->area;
        }
        
        if( $stores != null)
        {
            $stores = $stores->paginate(12);
        }

        return view('landing.store_list',compact('cities','stores','city_name','banners'));
    }
    
    
    public function blogs_details($id)
    {
        $blog = Blog::where('vendor_id','1')->where('id',$id)->first();
        $blogdata = Blog::where('vendor_id','1')->where('id','!=',$id)->get();
        return view('landing.blog_details',compact('blog','blogdata'));
    }

    public function faqs()
    {
        $allfaqs = Faq::where('vendor_id','1')->get();
        return view('landing.faqs',compact('allfaqs'));
    }
}
