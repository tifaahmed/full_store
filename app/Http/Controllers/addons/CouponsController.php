<?php
namespace App\Http\Controllers\Addons;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupons;
use App\Helpers\helper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class CouponsController extends Controller
{
    public function index()
    {
        $coupons = Coupons::where('vendor_id',Auth::user()->id)->orderBy('id', 'DESC')->paginate(10);
        return view('admin.coupons.index',compact('coupons'));
    }
    public function add()
    {
        return view('admin.coupons.add');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
            [   
                'name' => 'required',
                'code' => 'required',
                'price' => 'required',
                'active_from' => 'required',
                'active_to' => 'required',
                'limit' => 'required'
            ],[ 
                "name.required"=>trans('messages.name_required'),
                "code.required"=>trans('messages.code_required'),
                "price.required"=>trans('messages.price_required'),
                "active_from.required"=>trans('messages.active_from_required'),
                "active_to.required"=>trans('messages.active_to_required'),
                "limit.required"=>trans('messages.coupon_limit_required'),
            ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{  
            $coupons = new Coupons;
            $coupons->vendor_id = Auth::user()->id;
            $coupons->name = $request->name;
            $coupons->code = $request->code;
            $coupons->type = $request->type;
            $coupons->price = $request->price;
            $coupons->active_from = $request->active_from;
            $coupons->active_to = $request->active_to;
            $coupons->limit = $request->limit;
            $coupons->save();
            return redirect(route('coupons'))->with('success',trans('messages.success'));
        }
    }
    public function del(Request $request)
    {
        try {
            $del = Coupons::find($request->id);
            $del->delete();
            return redirect('/admin/coupons')->with('success',trans('messages.success'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',trans('messages.wrong'));
        }
    }
    public function show($id)
    {
        $cdata = Coupons::where('id',$id)->first();
        return view('admin.coupons.show',compact('cdata'));
    }
    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(),
            [   
                'name' => 'required',
                'code' => 'required',
                'price' => 'required',
                'active_from' => 'required',
                'active_to' => 'required',
                'limit' => 'required'
            ],[ 
                "name.required"=>trans('messages.name_required'),
                "code.required"=>trans('messages.code_required'),
                "price.required"=>trans('messages.price_required'),
                "active_from.required"=>trans('messages.active_from_required'),
                "active_to.required"=>trans('messages.active_to_required'),
                "limit.required"=>trans('messages.coupon_limit_required'),
            ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            Coupons::where('id', $id)
                    ->update([
                        'vendor_id' => Auth::user()->id,
                        'name' => $request->name,
                        'code' => $request->code,
                        'type' => $request->type,
                        'price' => $request->price,
                        'active_from' => $request->active_from,
                        'active_to' => $request->active_to,
                        'limit' => $request->limit,
                    ]);
            return redirect()->route('coupons')->with('success',trans('messages.success'));
        }
    }

     // api----------------------------------
     public function promocode(Request $request)
     {
         if ($request->vendor_id == "") {
             return response()->json(["status" => 0, "message" => trans('messages.vendor_id_required')], 200);
         }
         $date = date('Y-m-d');
         $promocodelist = Coupons::where("vendor_id", $request->vendor_id)->where("active_from", '<=', $date)->where("active_to", '>=', $date)->get();
         return response()->json(['status' => 1, 'message' => trans('messages.success'), 'promocodes' => $promocodelist], 200);
     }
     public function applypromocode(Request $request)
     {
        
         $user_id = "";
         if($request->user_id !="")
         {
             $user_id = $request->user_id;
         }
         if ($request->vendor_id == "") {
             return response()->json(["status" => 0, "message" => trans('messages.vendor_id_required')], 400);
         }
         if ($request->subtotal == "") {
             return response()->json(["status" => 0, "message" => trans('messages.subtotal_required')], 400);
         }
         if ($request->offer_code == "") {
             return response()->json(["status" => 0, "message" => trans('messages.promocode_required')], 400);
         }
         date_default_timezone_set(helper::appdata($request->vendor_id)->timezone);
         $checkoffercode = Coupons::where('code', $request->offer_code)->where('vendor_id', $request->vendor_id)->first();
        
         if (!empty($checkoffercode)) {
             if ((date('Y-m-d') >= $checkoffercode->active_from) && (date('Y-m-d') <= $checkoffercode->active_to)) {
                 
                 if ($request->subtotal >= $checkoffercode->min_amount) {
                     if ($checkoffercode->usage_type == 1) {
                         if($user_id !="")
                         {
                             $checkcount = Order::select('couponcode')->where('couponcode', $request->offer_code)->where('vendor_id', $request->vendor_id)->where('user_id', $user_id)->count();
                         }
                         else
                         {
                             $checkcount = Order::select('couponcode')->where('code', $request->offer_code)->where('vendor_id', $request->vendor_id)->where('session_id', $request->session_id)->count();
                         }
                   
                         if ($checkcount >= $checkoffercode->usage_limit) {
                             return response()->json(["status" => 0, "message" => trans('messages.usage_limit_exceeded')], 400);
                         }
                     }
                     $offer_amount = $checkoffercode->price;
                     if ($checkoffercode->offer_type == 2) {
                         $offer_amount = $request->subtotal * $checkoffercode->price / 100;
                     }
                     $arr = array(
                         "offer_code" => $checkoffercode->code,
                         "offer_amount" => $offer_amount,
                         "vendor_id" => $request->vendor_id,
                     );
                     session()->put('discount_data', $arr);
                     return response()->json(["status" => 1, "message" => trans('messages.success'),'data' =>$arr], 200);
                 } else {
                     return response()->json(["status" => 0, "message" => trans('messages.order_amount_greater_then') . ' ' . helper::currency_formate($checkoffercode->min_amount, $request->vendor_id)], 200);
                 }
             } else {
                 return response()->json(["status" => 0, "message" => trans('messages.invalid_promocode')], 200);
             }
         } else {
             return response()->json(["status" => 0, "message" => trans('messages.invalid_promocode')], 200);
         }
     }
}
