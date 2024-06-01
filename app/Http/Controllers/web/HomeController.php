<?php
namespace App\Http\Controllers\web;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Item;
use App\Models\Cart;
use App\Models\DeliveryArea;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Settings;
use App\Models\Subscriber;
use App\Models\User;
use App\Models\Timing;
use App\Models\Payment;
use App\Models\Contact;
use App\Models\Coupons;
use App\Models\Terms;
use App\Models\About;
use App\Models\Privacypolicy;
use App\Models\Banner;
use App\Helpers\helper;
use App\Models\Blog;
use App\Models\Extra;
use App\Models\ItemImages;
use App\Models\RefundPrivacypolicy;
use App\Models\Branch;
use Session;
use DateTime;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
use DateInterval;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\TableBook;
use App\Models\TableQR;
use App\Models\Variants;
use Illuminate\Support\Facades\URL;
use Lunaweb\RecaptchaV3\Facades\RecaptchaV3;
use Config;
use Stevebauman\Location\Facades\Location;
use App;
class HomeController extends Controller
{

    public function index(Request $request)
    {

        if ($request->tid) {
            Session::put('table_id', $request->tid);
        }
        // return env('WEBSITE_HOST');
        $host = $_SERVER['HTTP_HOST'];
        if ($host  ==  env('WEBSITE_HOST')) {
            $storeinfo = helper::storeinfo($request->vendor);
            $vdata = $storeinfo->id;
        }
        // if the current host doesn't contain the website domain (meaning, custom domain)
        else {
            $storeinfo = Settings::where('custom_domain', $host)->first();
            $vdata = $storeinfo->vendor_id;
        }

        $getcategory = Category::where('vendor_id', $vdata)->where('is_available', '=', '1')->where('is_deleted', '2')->orderBy('reorder_id', 'ASC')->get();
        if (Auth::user() && Auth::user()->type == 3) {
            $user_id = Auth::user()->id;
            $getitem = Item::TimeFilter()->with(['variation', 'extras', 'item_image'])->select('items.*', DB::raw('(case when favorite.item_id is null then 0 else 1 end) as is_favorite'))
                ->leftJoin('favorite', function ($query) use ($user_id) {
                    $query->on('favorite.item_id', '=', 'items.id')
                        ->where('favorite.user_id', '=', $user_id);
                })->where('items.vendor_id', $vdata)->where('is_available', '1')->orderBy('reorder_id', 'ASC')->get();
        } else {
            $getitem = Item::TimeFilter()->with(['variation', 'extras', 'item_image'])->where('vendor_id', $vdata)->where('is_available', '1')->orderBy('reorder_id', 'ASC')->get();
        }
        $paymentlist = Payment::where('vendor_id', $vdata)->where('is_available', 1)->get();
        $settingdata = Settings::where('vendor_id', $vdata)->select('template')->first();

        $bannerimage = Banner::where('vendor_id', $vdata)->orderBy('id', 'ASC')->get();
        $cartitems = Cart::select('id', 'item_id', 'item_name', 'item_image', 'item_price', 'extras_id', 'extras_name', 'extras_price', 'qty', 'price', 'tax', 'variants_id', 'variants_name', 'variants_price')
            ->where('vendor_id', $vdata);
        if (Auth::user() && Auth::user()->type == 3) {
            $cartitems->where('user_id', @Auth::user()->id);
        } else {
            $cartitems->where('session_id', Session::getId());
        }
        $blogs = Blog::orderByDesc('id')->where('vendor_id', $vdata)->get();

        $cartdata = $cartitems->get();
        if (empty($storeinfo)) {

            abort(404);
        }
        if (Auth::user() && Auth::user()->type == 3) {
            $count = Cart::where('user_id', Auth::user()->id)->where('vendor_id', $vdata)->count();
        } else {
            $count = Cart::where('session_id', Session::getId())->where('vendor_id', $vdata)->count();
        }
        session()->put('cart', $count);
        $deliveryareas = DeliveryArea::where('vendor_id', $vdata)->whereNotNull('coordinates')->get();
        $branches = Branch::where('vendor_id', $vdata)->where('is_active', 1)->get();

        return view('front.template-' . $settingdata->template . '.index', compact(
            'getcategory',
            'paymentlist',
            'getitem',
            'storeinfo',
            'bannerimage',
            'cartdata',
            'blogs',
            'deliveryareas',
            'branches'
        ));
    }

    public function categories(Request $request)
    {
        $host = $_SERVER['HTTP_HOST'];
        if ($host  ==  env('WEBSITE_HOST')) {
            $storeinfo = helper::storeinfo($request->vendor);
            $vdata = $storeinfo->id;
        }
        // if the current host doesn't contain the website domain (meaning, custom domain)
        else {
            $storeinfo = Settings::where('custom_domain', $host)->first();
            $vdata = $storeinfo->vendor_id;
        }
        $getcategory = Category::where('vendor_id', $vdata)->where('is_available', '=', '1')->where('is_deleted', '2')->orderBy('reorder_id', 'ASC')->get();
        if (Auth::user() && Auth::user()->type == 3) {
            $user_id = Auth::user()->id;
            $getitem = Item::TimeFilter()->with(['variation', 'extras', 'item_image'])->select('items.*', DB::raw('(case when favorite.item_id is null then 0 else 1 end) as is_favorite'))
                ->leftJoin('favorite', function ($query) use ($user_id) {
                    $query->on('favorite.item_id', '=', 'items.id')
                        ->where('favorite.user_id', '=', $user_id);
                })->where('items.vendor_id', $vdata)->where('is_available', '1')->orderBy('reorder_id', 'ASC')->get();
        } else {
            $getitem = Item::TimeFilter()->with(['variation', 'extras', 'item_image'])->where('vendor_id', $vdata)->where('is_available', '1')->orderBy('reorder_id', 'ASC')->get();
        }
        $bannerimage = Banner::where('vendor_id', $vdata)->orderBy('id', 'ASC')->get();
        $cartitems = Cart::select('id', 'item_id', 'item_name', 'item_image', 'item_price', 'extras_id', 'extras_name', 'extras_price', 'qty', 'price', 'tax', 'variants_id', 'variants_name', 'variants_price')
            ->where('vendor_id', $vdata);
        if (Auth::user() && Auth::user()->type == 3) {
            $cartitems->where('user_id', @Auth::user()->id);
        } else {
            $cartitems->where('session_id', Session::getId());
        }
        $blogs = Blog::orderByDesc('id')->where('vendor_id', $vdata)->get();
        $cartdata = $cartitems->get();
        if (empty($storeinfo)) {

            abort(404);
        }
        if (Auth::user() && Auth::user()->type == 3) {
            $count = Cart::where('user_id', Auth::user()->id)->where('vendor_id', $vdata)->count();
        } else {
            $count = Cart::where('session_id', Session::getId())->where('vendor_id', $vdata)->count();
        }
        session()->put('cart', $count);

        return view('front.template-3.category', compact('getcategory', 'getitem', 'storeinfo', 'bannerimage', 'cartdata', 'blogs'));
    }
    public function user_subscribe(Request $request)
    {
        try {
            $host = $_SERVER['HTTP_HOST'];
            if ($host  ==  env('WEBSITE_HOST')) {
                $vdata = $request->id;
            }
            // if the current host doesn't contain the website domain (meaning, custom domain)
            else {
                $storeinfo = Settings::where('custom_domain', $host)->first();
                $vdata = $storeinfo->vendor_id;
            }

            $subscribe = new Subscriber;
            $subscribe->vendor_id = $vdata;
            $subscribe->email = $request->email;
            $subscribe->save();
            return redirect()->back()->with('success', trans('messages.success'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', trans('messages.wrong'));
        }
    }
    public function contact(Request $request)
    {
        $storeinfo = helper::storeinfo($request->vendor);
        $timings = Timing::where('vendor_id', $storeinfo->id)->get();
        return view('front.contactus', compact('storeinfo', 'timings'));
    }
    public function save_contact(Request $request)
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
            if ($score <= helper::appdata('')->score_threshold) {
                return redirect()->back()->with('error', 'You are most likely a bot');
            }
        }

        $newinquiry = new Contact;
        $newinquiry->vendor_id = $request->vendor_id;
        $newinquiry->name = $request->first_name . " " . $request->last_name;
        $newinquiry->email = $request->email;
        $newinquiry->mobile = $request->mobile;
        $newinquiry->message = $request->message;
        $newinquiry->save();
        $vendordata = User::where('id', $request->vendor_id)->first();
        $emaildata = helper::emailconfigration($vendordata->id);
        Config::set('mail', $emaildata);
        helper::vendor_contact_data($vendordata->name, $vendordata->email, $request->name, $request->email, $request->mobile, $request->message);
        return redirect()->back()->with('success', trans('messages.success'));
    }


    public function table_book(Request $request)
    {
        $storeinfo = helper::storeinfo($request->vendor);
        return view('front.tablebook', compact('storeinfo'));
    }
    public function save_booking(Request $request)
    {
        $host = $_SERVER['HTTP_HOST'];
        if ($host  ==  env('WEBSITE_HOST')) {
            $vdata = $request->vendor_id;
        }
        // if the current host doesn't contain the website domain (meaning, custom domain)
        else {
            $storeinfo = Settings::where('custom_domain', $host)->first();
            $vdata = $storeinfo->vendor_id;
        }
        $table = new TableBook;
        $table->vendor_id = $vdata;
        $table->event = $request->event;
        $table->people = $request->people;
        $table->event_date = $request->event_date;
        $table->event_time = $request->event_time;
        $table->name = $request->name;
        $table->email = $request->email;
        $table->mobile = $request->mobile;
        $table->notes = $request->notes;
        $table->save();
        return redirect()->back()->with('success', trans('messages.success'));
    }


    public function aboutus(Request $request)
    {
        $host = $_SERVER['HTTP_HOST'];
        if ($host  ==  env('WEBSITE_HOST')) {
            $storeinfo = helper::storeinfo($request->vendor);
            $vdata = $storeinfo->id;
        }
        // if the current host doesn't contain the website domain (meaning, custom domain)
        else {
            $storeinfo = Settings::where('custom_domain', $host)->first();
            $vdata = $storeinfo->vendor_id;
        }

        $aboutus = About::select('about_content')->where('vendor_id', $vdata)->first();

        return view('front.about', compact('aboutus', 'storeinfo'));
    }

    public function bloglist(Request $request)
    {
        $host = $_SERVER['HTTP_HOST'];
        if ($host  ==  env('WEBSITE_HOST')) {
            $storeinfo = helper::storeinfo($request->vendor);
            $vdata = $storeinfo->id;
        }
        // if the current host doesn't contain the website domain (meaning, custom domain)
        else {
            $storeinfo = Settings::where('custom_domain', $host)->first();
            $vdata = $storeinfo->vendor_id;
        }
        $blogs = Blog::orderByDesc('id')->where('vendor_id', $vdata)->paginate(8);
        return view('front.blog-list', compact('storeinfo', 'blogs'));
    }
    public function blogdetails(Request $request)
    {
        $host = $_SERVER['HTTP_HOST'];
        if ($host  ==  env('WEBSITE_HOST')) {
            $storeinfo = helper::storeinfo($request->vendor);
            $vdata = $storeinfo->id;
        }
        // if the current host doesn't contain the website domain (meaning, custom domain)
        else {
            $storeinfo = Settings::where('custom_domain', $host)->first();
            $vdata = $storeinfo->vendor_id;
        }
        $blogdetail = Blog::where('slug', $request->slug)->first();
        $getblog = Blog::where('vendor_id', $vdata)->where('slug', '!=', $request->slug)->orderByDesc('id')->take(4)->get();
        return view('front.blog-deatils', compact('getblog', 'blogdetail', 'storeinfo'));
    }
    public function terms_condition(Request $request)
    {
        $host = $_SERVER['HTTP_HOST'];
        if ($host  ==  env('WEBSITE_HOST')) {
            $storeinfo = helper::storeinfo($request->vendor);
            $vdata = $storeinfo->id;
        }
        // if the current host doesn't contain the website domain (meaning, custom domain)
        else {
            $storeinfo = Settings::where('custom_domain', $host)->first();
            $vdata = $storeinfo->vendor_id;
        }
        $terms = terms::where('vendor_id', $vdata)->orderBy('id', 'ASC')->first();
        return view('front.terms_and_condition', compact('storeinfo', 'terms'));
    }
    public function privacyshow(Request $request)
    {
        $host = $_SERVER['HTTP_HOST'];
        if ($host  ==  env('WEBSITE_HOST')) {
            $storeinfo = helper::storeinfo($request->vendor);
            $vdata = $storeinfo->id;
        }
        // if the current host doesn't contain the website domain (meaning, custom domain)
        else {
            $storeinfo = Settings::where('custom_domain', $host)->first();
            $vdata = $storeinfo->vendor_id;
        }
        $privacy = Privacypolicy::where('vendor_id', $vdata)->orderBy('id', 'ASC')->first();
        return view('front.privacy', compact('storeinfo', 'privacy'));
    }
    public function refundprivacypolicy(Request $request)
    {
        $host = $_SERVER['HTTP_HOST'];
        if ($host  ==  env('WEBSITE_HOST')) {
            $storeinfo = helper::storeinfo($request->vendor);
            $vdata = $storeinfo->id;
        }
        // if the current host doesn't contain the website domain (meaning, custom domain)
        else {
            $storeinfo = Settings::where('custom_domain', $host)->first();
            $vdata = $storeinfo->vendor_id;
        }
        $refund_policy = RefundPrivacypolicy::where('vendor_id', $vdata)->orderBy('id', 'ASC')->first();
        return view('front.refund_policy', compact('storeinfo', 'refund_policy'));
    }
    public function addtocart(Request $request)
    {
        try {
            $host = $_SERVER['HTTP_HOST'];
            if ($host  ==  env('WEBSITE_HOST')) {
                $vdata = $request->vendor_id;
            }
            // if the current host doesn't contain the website domain (meaning, custom domain)
            else {
                $storeinfo = Settings::where('custom_domain', $host)->first();
                $vdata = $storeinfo->vendor_id;
            }
            $totalprice = 0;
            $cart = new Cart;
            if (Auth::user() && Auth::user()->type == 3) {
                $cart->user_id = Auth::user()->id;
            } else {
                $cart->session_id = Session::getId();
            }
            $cart->vendor_id = $vdata;
            $cart->item_id = $request->id;
            $cart->item_name = $request->name;
            $cart->item_image = $request->image;
            $cart->item_price = $request->item_price;
            $cart->tax = $request->tax;
            $cart->extras_id = $request->extras_id;
            $cart->extras_name = $request->extras_name;
            $cart->extras_price = $request->extras_price;
            $cart->qty = $request->qty;
            if ($request->extras_price != null) {
                $extraprices =  explode(',', $request->extras_price);
                foreach ($extraprices as $price) {
                    $totalprice += $price;
                }
            }
            if ($request->variants_price != null) {
                $totalprice += $request->variants_price;
                $cart->price = $totalprice;
            } else {
                $cart->price = $request->item_price + $totalprice;
            }

            $cart->variants_id = $request->variants_id;
            $cart->variants_name = $request->variants_name;
            $cart->variants_price = $request->variants_price;
            $cart->save();
            if (Auth::user() && Auth::user()->type == 3) {
                $count = Cart::where('user_id', Auth::user()->id)->where('vendor_id', $vdata)->count();
            } else {
                $count = Cart::where('session_id', Session::getId())->where('vendor_id', $vdata)->count();
            }
            if (Auth::user() && Auth::user()->type == 3) {
                $totalcart = helper::getcartcount($request->vendor_id, Auth::user() && Auth::user()->type == 3 ? Auth::user()->id : "");
            } else {
                $totalcart = helper::getcartcount($request->vendor_id, '');
            }

            session()->put('cart', $count);
            session()->put('vendor_id', $request->vendor_id);
            session()->put('old_session_id', Session::getId());
            return response()->json(['status' => 1, 'message' => 'Item has been added to your cart', 'totalcart' => $totalcart], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => 0, 'message' => $e], 400);
        }
    }
    public function details(Request $request)
    {
        app()->setLocale(session()->get('locale'));
        
    
        $variants = Variants::where('item_id', $request->id)->get()
            ->append('name_translated');

        $extras = Extra::where('item_id', $request->id)->get()
            ->append('name_translated');

        $getitem = Item::select(
            'id',
            'item_original_price',
            'image',
            'description',
            'tax',
            \DB::raw("CONCAT('" . url(env('ASSETSPATHURL') . 'item/') . "/',image) AS image_url")
        )
        ->where('id', $request->id)->first()
        ->append('description_translated', 'title_translated');


        $itemimages  = ItemImages::select(
            'id',
            'image',
            'item_id',
            \DB::raw("CONCAT('" . url(env('ASSETSPATHURL') . 'item/') . "/', image) AS image_url")
        )->where('item_id', $request->id)->get();

        return response()->json(['ResponseCode' => 1, 'ResponseText' => 'Success', 'variants' => $variants, 'extras' => $extras, 'getitem' => $getitem, 'itemimages' => $itemimages], 200);
    }
    public function cart(Request $request)
    {
        $host = $_SERVER['HTTP_HOST'];
        if ($host  ==  env('WEBSITE_HOST')) {
            // get the current vendor from url
            $storeinfo = helper::storeinfo($request->vendor);
            $vdata = $storeinfo->id;
        }
        // if the current host doesn't contain the website domain (meaning, custom domain)
        else {
            $storeinfo = Settings::where('custom_domain', $host)->first();
            $vdata = $storeinfo->vendor_id;
        }
        $settings = Settings::where('custom_domain', $host)->first();
        dd($settings);
    
        // get the carts of the url vendor
        $cartitems = Cart::select(
            'id',
            'item_id',
            'item_name',
            'item_image',
            'item_price',
            'extras_id',
            'extras_name',
            'extras_price',
            'qty',
            'price',
            'tax',
            'variants_id',
            'variants_name',
            'variants_price'
        )
            ->where('vendor_id', $vdata);
        if (Auth::user() && Auth::user()->type == 3) { // 3=driver
            $cartitems->where('user_id', @Auth::user()->id);
        } else { //2=vendor, 1=Admin , 4=Customer
            $cartitems->where('session_id', Session::getId());
        }
        $cartdata = $cartitems->get();
        return view('front.cart', compact('cartdata', 'storeinfo'));
    }
    public function qtyupdate(Request $request)
    {

        if ($request->cart_id == "") {
            return response()->json(["status" => 0, "message" => "Cart ID is required"], 200);
        }
        if ($request->qty == "") {
            return response()->json(["status" => 0, "message" => "Qty is required"], 200);
        }
        $cartdata = Cart::where('id', $request->cart_id)
            ->get()
            ->first();
        if ($request->type == "minus") {
            $qty = $cartdata->qty - 1;
        } else {
            $qty = $cartdata->qty + 1;
        }
        $update = Cart::where('id', $request['cart_id'])->update(['qty' => $qty]);
        return response()->json(['status' => 1, 'message' => 'Qty has been update'], 200);
    }
    public function deletecartitem(Request $request)
    {
        if ($request->cart_id == "") {
            return response()->json(["status" => 0, "message" => "Cart Id is required"], 200);
        }
        $cart = Cart::where('id', $request->cart_id)->delete();
        if (Auth::user() && Auth::user()->type == 3) {
            $count = Cart::where('user_id', Auth::user()->id)->where('vendor_id', @$storeinfo->id)->count();
        } else {
            $count = Cart::where('session_id', Session::getId())->where('vendor_id', @$storeinfo->id)->count();
        }
        session()->forget(['offer_amount', 'offer_code', 'offer_type']);
        if ($cart) {
            return response()->json(['status' => 1, 'message' => 'Success', 'cartcnt' => $count], 200);
        } else {
            return response()->json(['status' => 0], 200);
        }
    }
    public function checkout(Request $request)
    {

        $host = $_SERVER['HTTP_HOST'];
        if ($host  ==  env('WEBSITE_HOST')) {
            $storeinfo = helper::storeinfo($request->vendor);
            $vdata = $storeinfo->id;
        }
        // if the current host doesn't contain the website domain 
        // (meaning, custom domain)
        else {
            $storeinfo = Settings::where('custom_domain', $host)->first();
            $vdata = $storeinfo->vendor_id;
        }
        $isStoreAvailable = helper::isStoreAvailable($vdata);

        $cartitems = Cart::select(
            'id',
            'item_id',
            'item_name',
            'item_image',
            'item_price',
            'extras_id',
            'extras_name',
            'extras_price',
            'qty',
            'price',
            'tax',
            'variants_id',
            'variants_name',
            'variants_price'
        )
            ->where('vendor_id', $vdata);
        if (Auth::user() && Auth::user()->type == 3) {
            $cartitems->where('user_id', @Auth::user()->id);
        } else {
            $cartitems->where('session_id', Session::getId());
        }
        $cartdata = $cartitems->get();
        if (count($cartdata) == 0) {
            return redirect($storeinfo->slug . '/cart')->with('error', trans('messages.cart_empty'));
        }
        $deliveryarea = DeliveryArea::where('vendor_id', $vdata)->whereNotNull('coordinates')->get();
        $paymentlist = Payment::where('is_available', '1')->where('is_activate', 1)
            ->where('vendor_id', $vdata)->get();
        $coupons = Coupons::where('vendor_id', $vdata)->orderBy('id', 'ASC')->get();
        $tableqrs = TableQR::where('vendor_id', $vdata)->orderBy('id', 'ASC')->get();
        $branches = Branch::where('vendor_id', $vdata)->where('is_active', 1)->get();
        return view('front.checkout', compact(
            'isStoreAvailable',
            'cartdata',
            'deliveryarea',
            'storeinfo',
            'paymentlist',
            'coupons',
            'tableqrs',
            'branches'
        ));
    }

    public function applypromocode(Request $request)
    {

        if ($request->promocode == "") {
            return response()->json(["status" => 0, "message" => trans('messages.enter_promocode')], 200);
        }
        // chexk  code & vendor_id
        $promocode = Coupons::where('code', $request->promocode)
            ->where('vendor_id', $request->vendor_id)
            ->first();

        if (@helper::appdata($request->vendor_id)->timezone != "") {
            date_default_timezone_set(helper::appdata($request->vendor_id)->timezone);
        }
        // chexk  date (start_date ,end_date)
        $current_date = date('Y-m-d');
        $start_date = date('Y-m-d', strtotime($promocode->active_from));
        $end_date = date('Y-m-d', strtotime($promocode->active_to));
        if ($start_date <= $current_date && $current_date <= $end_date) {
            if ($promocode->limit > 0) {
                if ($request->sub_total < @$promocode->price) { // Order Total < $promocode->price
                    return response()->json(["status" => 0, "message" => trans('messages.not_eligible')], 200);
                }
                session([
                    'offer_amount' => @$promocode->price,
                    'offer_code' => @$promocode->code,
                    'offer_type' => @$promocode->type,
                ]);
            } else {
                return response()->json(['status' => 0, 'message' => trans('messages.limit_over')], 200);
            }
        } else {
            return response()->json(['status' => 0, 'message' => trans('messages.promocode_expired')], 200);
        }


        if (@$promocode->code == $request->promocode) {
            // total  10 egp descount 10% return 1egp
            $promocode->price = $this->orderTrait_getOrderDiscount($promocode->id);

            return response()->json([
                'status' => 1,
                'message' => trans('messages.promocode_applied'),
                'data' => $promocode
            ], 200);
        } else {
            return response()->json(['status' => 0, 'message' => trans('messages.wrong_promocode')], 200);
        }
    }
    public function removepromocode(Request $request)
    {
        $remove = session()->forget(['offer_amount', 'offer_code', 'offer_type']);
        if (!$remove) {
            return response()->json(['status' => 1, 'message' => trans('messages.promocode_removed')], 200);
        } else {
            return response()->json(['status' => 0, 'message' => trans('messages.wrong')], 200);
        }
    }
    public function timeslot(Request $request)
    {
        try {
            $host = $_SERVER['HTTP_HOST'];
            if ($host  ==  env('WEBSITE_HOST')) {
                $storeinfo = helper::storeinfo($request->vendor);
                $vdata = $storeinfo->id;
            }
            // if the current host doesn't contain the website domain (meaning, custom domain)
            else {
                $storeinfo = Settings::where('custom_domain', $host)->first();
                $vdata = $storeinfo->vendor_id;
            }

            $timezone = helper::appdata($vdata);

            $slots = [];
            date_default_timezone_set($timezone->timezone);

            if ($request->inputDate != "" || $request->inputDate != null) {
                $day = date('l', strtotime($request->inputDate));
                $minute = "";
                $time = Timing::where('vendor_id', $vdata)->where('day', $day)->first();
                if ($time->is_always_close == 1) {
                    $slots = "1";
                } else {
                    if (helper::appdata($vdata)->interval_type == 2) {
                        $minute = (float)helper::appdata($vdata)->interval_time * 60;
                    }
                    if (helper::appdata($vdata)->interval_type == 1) {
                        $minute = helper::appdata($vdata)->interval_time;
                    }
                    $duration = $minute;
                    $cleanup = 0;
                    $start = $time->open_time;
                    $break_start = $time->break_start; // break start
                    $break_end   = $time->break_end; // break end
                    $end = $time->close_time;
                    $firsthalf = self::firsthalf($duration, $cleanup, $start, $break_start);
                    $secondhalf = self::secondhalf($duration, $cleanup, $break_end, $end);
                    $period = array_merge($firsthalf, $secondhalf);
                    $currenttime = Carbon::now()->format('h:i a');
                    $current_date = Carbon::now()->format('Y-m-d');

                    foreach ($period as $item) {
                        if ($request->inputDate == $current_date) {
                            $slottime = explode('-', $item);
                            if (strtotime($slottime[0]) <= strtotime($currenttime)) {
                                $status = "";
                            } else {
                                $status = "active";
                            }
                        } else {
                            $status = "active";
                        }
                        $slots[] = array(
                            'slot' =>  $item,
                            'status' => $status,
                        );
                    }
                }
            }
            return $slots;
        } catch (\Throwable $th) {
            return response()->json(['status' => 0, 'message' => trans('messages.wrong')], 200);
        }
    }
    function firsthalf($duration, $cleanup, $start, $break_start)
    {
        $start = new DateTime($start);
        $break_start  = new DateTime($break_start);
        $interval = new DateInterval('PT' . $duration . 'M');
        $cleanupinterval = new DateInterval('PT' . $cleanup . 'M');
        $slots = array();
        for ($intStart = $start; $intStart < $break_start; $intStart->add($interval)->add($cleanupinterval)) {
            $endperiod = clone $intStart;
            $endperiod->add($interval);
            if (strtotime($break_start->format('h:i A')) < strtotime($endperiod->format('h:i A')) && strtotime($endperiod->format('h:i A')) < strtotime($break_start->format('h:i A'))) {
                $endperiod = $break_start;
                $slots[] = $intStart->format('h:i A') . ' - ' . $endperiod->format('h:i A');
                $intStart = $break_start;
                $endperiod = $break_start;
                $intStart->sub($interval);
            }
            $slots[] = $intStart->format('h:i A') . ' - ' . $endperiod->format('h:i A');
        }
        return $slots;
    }
    function secondhalf($duration, $cleanup, $break_end, $end)
    {
        $break_end = new DateTime($break_end);
        $end  = new DateTime($end);
        $interval = new DateInterval('PT' . $duration . 'M');
        $cleanupinterval = new DateInterval('PT' . $cleanup . 'M');
        $slots = array();
        for ($intStart = $break_end; $intStart < $end; $intStart->add($interval)->add($cleanupinterval)) {
            $endperiod = clone $intStart;
            $endperiod->add($interval);
            if (strtotime($end->format('h:i A')) < strtotime($endperiod->format('h:i A')) && strtotime($endperiod->format('h:i A')) < strtotime($break_end->format('h:i A'))) {
                $endperiod = $end;
                $slots[] = $intStart->format('h:i A') . ' - ' . $endperiod->format('h:i A');
                $intStart = $end;
                $endperiod = $end;
                $intStart->sub($interval);
            }
            $slots[] = $intStart->format('h:i A') . ' - ' . $endperiod->format('h:i A');
        }
        return $slots;
    }
    // checkplan of the vendor before placing the order
    public function checkplan(Request $request)
    {
        $checkplan = helper::checkplan($request->vendor_id, '3');
        return $checkplan;
    }
    public function paymentmethod(Request $request)
    {
        $host = $_SERVER['HTTP_HOST'];
        if ($host  ==  env('WEBSITE_HOST')) {
            $vendorinfo = User::where('id', $request->vendor_id)->first();

            $vdata = $request->vendor_id;
        }
        // if the current host doesn't contain the website domain (meaning, custom domain)
        else {
            $vendorinfo = Settings::where('custom_domain', $host)->first();

            $vdata = $vendorinfo->vendor_id;
        }
        $payment_id = "";
        $user_id = "";
        $session_id = "";
        if (Auth::user() && Auth::user()->type == 3) {
            $user_id = Auth::user()->id;
        } else {
            $session_id = session()->getId();
            $user_id = null;
        }
        $payment_id = $request->payment_id;
        if ($request->payment_type == "stripe") {
            $getstripe = Payment::select('environment', 'secret_key', 'currency')
                ->where('payment_name', 'Stripe')->where('vendor_id', $vdata)->first();

            $skey = $getstripe->secret_key;
            Stripe::setApiKey($skey);
            $customer = Customer::create(
                array(
                    'email' => $request->customer_email,
                    'source' =>  $request->stripeToken,
                    'name' => $request->customer_name,
                )
            );
            $charge = Charge::create(
                array(
                    'customer' => $customer->id,
                    'amount' => $request->grand_total * 100,
                    'currency' => $getstripe->currency,
                    'description' => 'Store-Mart',
                )
            );
            if ($request->payment_id == "") {
                $payment_id = $charge['id'];
            } else {
                $payment_id = $request->payment_id;
            }
        }
        $orderresponse = helper::createorder(
            $request->vendor_id,
            $user_id,
            $session_id,

            $request->payment_type,
            $payment_id,

            $request->customer_email,
            $request->customer_name,
            $request->customer_mobile,
            $request->notes,

            $request->stripeToken,
            $request->grand_total,
            $request->delivery_charge,

            $request->address,
            $request->building,
            $request->landmark,
            $request->block,
            $request->street,
            $request->house_num,
            $request->latitude,
            $request->longitude,
            $request->branch_id,
            $request->postal_code,

            $request->discount_amount,
            $request->sub_total,
            $request->tax,

            $request->is_delivery_now,
            $request->delivery_time,
            $request->delivery_date,
            $request->delivery_area,

            $request->couponcode,
            $request->order_type,
            $request->table
        );
        if (isset($orderresponse['status']) && $orderresponse['status'] == -1) {
            $url = URL::to(@$vendorinfo->slug . "/cart");
            return response()->json(['status' => 0, 'message' => trans('messages.cart_empty'), "url" =>  $url]);
        }

        if ($request->couponcode != null) {
            $promocode = Coupons::where('code', $request->couponcode)->where('vendor_id', $vdata)->first();
            $promocode->limit = $promocode->limit - 1;
            $promocode->save();
        }

        $url = URL::to(@$vendorinfo->slug . "/success/" . $orderresponse);

        return response()->json(['status' => 1, 'message' => trans('messages.order_placed'), "order_number" => $orderresponse, "url" =>  $url], 200);
    }
    public function ordersuccess(Request $request)
    {
        $host = $_SERVER['HTTP_HOST'];
        if ($host  ==  env('WEBSITE_HOST')) {
            $storeinfo = helper::storeinfo($request->vendor);
        }
        // if the current host doesn't contain the website domain (meaning, custom domain)
        else {
            $storeinfo = Settings::where('custom_domain', $host)->first();
        }
        $order_number = $request->order_number;
        $whmessage = helper::whatsappmessage($request->order_number, $storeinfo->slug, $storeinfo);
        return view('front.ordersuccess', compact('storeinfo', 'order_number', 'whmessage'));
    }
    public function trackorder(Request $request)
    {
        $host = $_SERVER['HTTP_HOST'];
        if ($host  ==  env('WEBSITE_HOST')) {
            $storeinfo = helper::storeinfo($request->vendor);
            $vdata = $storeinfo->id;
        }
        // if the current host doesn't contain the website domain (meaning, custom domain)
        else {
            $storeinfo = Settings::where('custom_domain', $host)->first();
            $vdata = $storeinfo->vendor_id;
        }

        $status = Order::select(
            'order_number',
            DB::raw('DATE_FORMAT(created_at, "%d %M %Y") as date'),
            'address',
            'building',
            'landmark',
            'block',
            'street',
            'house_num',
            'pincode',
            'order_type',
            'id',
            'discount_amount',
            'order_number',
            'status',
            'order_notes',
            'tax',
            'delivery_charge',
            'couponcode',
            'sub_total',
            'grand_total',
            'customer_name',
            'customer_email',
            'mobile',
            'latitude',
            'longitude'
        )
            ->where('order_number', $request->ordernumber)->first();
        $orderdata = Order::with('tableqr')->where('order_number', $request->ordernumber)->first();
        $orderdetails = OrderDetails::where('order_details.order_id', $status->id)->get();
        $summery = array(
            'id' => $status->id,
            'tax' => $status->tax,
            'discount_amount' => $status->discount_amount,
            'order_number' => $status->order_number,
            'created_at' => $status->date,
            'delivery_charge' => $status->delivery_charge,
            'address' => $status->address,
            'building' => $status->building,
            'landmark' => $status->landmark,
            'block' => $status->block,
            'street' => $status->street,
            'house_num' => $status->house_num,
            'latitude' => $status->latitude,
            'longitude' => $status->longitude,
            'pincode' => $status->pincode,
            'order_notes' => $status->order_notes,
            'status' => $status->status,
            'order_type' => $status->order_type,
            'couponcode' => $status->couponcode,
            'sub_total' => $status->sub_total,
            'grand_total' => $status->grand_total,
            'customer_name' => $status->customer_name,
            'customer_email' => $status->customer_email,
            'mobile' => $status->mobile,

        );

        return view('front.track-order', compact('storeinfo', 'orderdata', 'summery', 'orderdetails'));
    }
    public function cancelorder($order_number)
    {
        $update = Order::where('order_number', $order_number)->update(['status' => "4"]);
        $orderdata = Order::where('order_number', $order_number)->first();
        $emaildata = User::select('id', 'name', 'slug', 'email', 'mobile', 'token')->where('id', $orderdata->vendor_id)->first();
        $title = trans('labels.order_update');
        $body = "#" . $order_number . " has been cancelled";
        helper::push_notification($emaildata->token, $title, $body, "order", $orderdata->id);
        return redirect()->back()->with('success', trans('messages.success'));
    }
    public function ordercreate(Request $request)
    {

        if ($request->paymentId != "") {
            $paymentid = $request->paymentId;
        }
        if ($request->payment_id != "") {
            $paymentid = $request->payment_id;
        }
        if ($request->transaction_id != "") {
            $paymentid = $request->transaction_id;
        }

        $user_id = "";
        $session_id = "";
        if (Auth::user() && Auth::user()->type == 3) {
            $user_id = Auth::user()->id;
        } else {
            $session_id = session()->getId();
        }
        $orderresponse = helper::createorder(
            Session::get('vendor_id'),
            $user_id,
            $session_id,
            Session::get('payment_type'),
            $paymentid,
            Session::get('customer_email'),
            Session::get('customer_name'),
            Session::get('customer_mobile'),
            Session::get('stripeToken'),
            Session::get('grand_total'),
            Session::get('delivery_charge'),
            Session::get('address'),
            Session::get('building'),
            Session::get('landmark'),
            Session::get('block'),
            Session::get('street'),
            Session::get('house_num'),
            Session::get('latitude'),
            Session::get('longitude'),
            Session::get('postal_code'),

            Session::get('discount_amount'),
            Session::get('sub_total'),
            Session::get('tax'),

            Session::get('is_delivery_now'),
            Session::get('delivery_time'),
            Session::get('delivery_date'),
            Session::get('delivery_area'),
            Session::get('couponcode'),
            Session::get('order_type'),
            Session::get('notes'),
            Session::get('table')
        );


        $slug = Session::get('slug');
        $order_number = $orderresponse;

        return view('front.mercadoorder', compact('slug', 'order_number'));
    }
    public function search(Request $request)
    {

        $user_id = @Auth::user()->id;
        $host = $_SERVER['HTTP_HOST'];
        if ($host  ==  env('WEBSITE_HOST')) {
            $storeinfo = helper::storeinfo($request->vendor);
            $vdata = $storeinfo->id;
        }
        // if the current host doesn't contain the website domain (meaning, custom domain)
        else {
            $storeinfo = Settings::where('custom_domain', $host)->first();
            $vdata = $storeinfo->vendor_id;
        }
        $getsearchitems = array();

        if ($user_id != null) {

            if ($request->has('search') && $request->search != "") {
                $getsearchitems = Item::TimeFilter()->with(['variation', 'extras'])->select('items.*', DB::raw('(case when favorite.item_id is null then 0 else 1 end) as is_favorite'))
                    ->leftJoin('favorite', function ($query) use ($user_id) {
                        $query->on('favorite.item_id', '=', 'items.id')
                            ->where('favorite.user_id', '=', $user_id);
                    })->where('items.vendor_id', $vdata)->where('is_available', '1')->where('items.item_name', 'LIKE', '%' . $request->search . '%')->orderBy('id', 'ASC')->get();
            }
        } else {

            if ($request->has('search') && $request->search != "") {
                $getsearchitems = Item::TimeFilter()->with(['variation', 'extras'])->where('vendor_id', $vdata)->where('is_available', '1')->where('item_name', 'LIKE', '%' . $request->search . '%')->orderBy('id', 'ASC')->get();
            }
        }


        return view('front.search', compact('getsearchitems', 'storeinfo'));
    }
}
