<?php
namespace App\Http\Controllers\addons;
use App\Helpers\helper;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Extra;
use App\Models\Item;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Variants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Session;
class POSController extends Controller
{
    public function index(Request $request)
    {
        try {

            $user_id = Auth::user()->id;
            $getcategory = Category::where('vendor_id', $user_id)->where('is_available', '=', '1')->where('is_deleted', '2')->orderBy('reorder_id', 'ASC')->get();
            $getitem = Item::with(['variation', 'extras','item_image'])
            ->select('items.*',DB::raw('(case when carts.item_id is null then 0 else 1 end) as is_cart'),'carts.id as cart_id','carts.qty as cart_qty')
            ->leftJoin('carts', function($query) use($user_id) {
                $query->on('carts.item_id','=','items.id')
                ->where('carts.vendor_id', '=', $user_id);
            })
            ->groupBy('items.id','carts.item_id')
            ->where('items.vendor_id',  $user_id)->where('items.is_available', '1')->orderBy('items.reorder_id', 'ASC')->get();
            $cartitems = Cart::select('id', 'item_id', 'item_name', 'item_image', 'item_price', 'extras_id', 'extras_name', 'extras_price', 'qty', 'price', 'tax', 'variants_id', 'variants_name', 'variants_price')
            ->where('vendor_id', $user_id)->where('session_id',Session::getId())->orderByDesc('id')->get();
            $getcustomerslist = User::select('users.id','users.name','users.email','users.mobile','users.image')->join('orders', 'orders.user_id', '=', 'users.id')->where('orders.vendor_id', $user_id)->groupBy('orders.user_id')->get();

           
            
            $ordersdetails = array();
            $cat_id = null;
            if($request->ajax())
            {
                if($request->id != null)
                {
                    $getitem = Item::with(['variation', 'extras','item_image'])->where('vendor_id', $user_id)->where('is_available', '1')->where('cat_id',$request->id)->orderBy('reorder_id', 'ASC')->get();
                }
                if($request->keyword != null)
                {
                    if($request->id != null)
                    {
                        $getitem = Item::with(['variation', 'extras','item_image'])->where('vendor_id', $user_id)->where('is_available', '1')->where('cat_id',$request->id)->where('item_name','LIKE','%'.$request->keyword.'%')->orderBy('reorder_id', 'ASC')->get();
                    }
                    else
                    {
                        $getitem = Item::with(['variation', 'extras','item_image'])->where('vendor_id', $user_id)->where('item_name','LIKE','%'.$request->keyword.'%')->where('is_available', '1')->orderBy('reorder_id', 'ASC')->get();
                    }
                }
                $cat_id = $request->id;
                return view('admin.pos.positem',compact('getitem','cat_id'));   
            }
            else
            {
                return view('admin.pos.index',compact('getcategory','getitem','cat_id','cartitems','getcustomerslist','ordersdetails'));
            }
        } catch (\Throwable $th) {
            return response()->json(['status' => 0, 'message' => trans('messages.wrong')],400);
        }
        
    }
    public function item_details(Request $request)
    {
        $variants = Variants::where('item_id',$request->id)->get();
        $extras = Extra::where('item_id',$request->id)->get();
        $getitem = Item::with('item_image')->where('id',$request->id)->first();
        return response()->json(['ResponseCode' => 1, 'ResponseText' => 'Success', 'variants' => $variants, 'extras' => $extras, "getitem" => $getitem], 200);
    }
    public function addtocart(Request $request)
    {
 
        try {
            $totalprice = 0;
            $cart = new Cart;
    
            $cart->session_id = Session::getId();
            $cart->vendor_id = Auth::user()->id;
            $cart->item_id = $request->id;
            $cart->item_name = $request->name;
            $cart->item_image = $request->image;
            $cart->item_price = $request->item_price;
            $cart->tax = $request->tax;
            $cart->extras_id = $request->extras_id;
            $cart->extras_name = $request->extras_name;
            $cart->extras_price = $request->extras_price;
            $cart->qty = $request->qty;
            if($request->extras_price != null)
            {
                $extraprices =  explode(',',$request->extras_price);
                foreach($extraprices as $price)
                {
                    $totalprice += $price;
                }
            }
            if($request->variants_price != null)
            {
                $totalprice += $request->variants_price;
                $cart->price = $totalprice;
            }
            else
            {
                $cart->price = $request->item_price + $totalprice;
            }
            
            $cart->variants_id = $request->variants_id;
            $cart->variants_name = $request->variants_name;
            $cart->variants_price = $request->variants_price;
            $cart->save();
            $cartitems = Cart::select('id', 'item_id', 'item_name', 'item_image', 'item_price', 'extras_id', 'extras_name', 'extras_price', 'qty', 'price', 'tax', 'variants_id', 'variants_name', 'variants_price')
            ->where('vendor_id', Auth::user()->id)->where('session_id',Session::getId())->orderByDesc('id')->get();
            $getcustomerslist = User::select('users.id','users.name','users.email','users.mobile','users.image')->join('orders', 'orders.user_id', '=', 'users.id')->where('orders.vendor_id', Auth::user()->id)->groupBy('orders.user_id')->get();
            $ordersdetails = array();
            return view('admin.pos.cartview',compact('cartitems','getcustomerslist','ordersdetails'));
        } catch (\Exception $e) {
            return response()->json(['status' => 0, 'message' => $e], 400);
        }
        
    }
    public function qtyupdate(Request $request)
    {
       $cart = Cart::where('id',$request->id)->first();
        
        if($request->type == "plus")
        {
            $cart->qty += 1;
        }
        else
        {
            if($cart->qty > 1)
            {
                $cart->qty -= 1;
            }
        }
        $cart->save();
        
        
        $cartitems = Cart::select('id', 'item_id', 'item_name', 'item_image', 'item_price', 'extras_id', 'extras_name', 'extras_price', 'qty', 'price', 'tax', 'variants_id', 'variants_name', 'variants_price')
        ->where('vendor_id', Auth::user()->id)->where('session_id',Session::getId())->orderByDesc('id')->get();
        $getcustomerslist = User::select('users.id','users.name','users.email','users.mobile','users.image')->join('orders', 'orders.user_id', '=', 'users.id')->where('orders.vendor_id', Auth::user()->id)->groupBy('orders.user_id')->get();
        $ordersdetails = array();
        return view('admin.pos.cartview',compact('cartitems','getcustomerslist','ordersdetails'));
    }
   
    public function deletecart(Request $request)
    {
        if($request->cart_id != '' )
        {
            Cart::where('id',$request->cart_id)->delete();
        }
        else
        {
            Cart::where('vendor_id',Auth::user()->id)->where('session_id',Session::getId())->delete();
        }
       
        return response()->json(['status' => 1, 'message' => 'Item Deleted!!'], 200);
    }
    public function createorder(Request $request)
    {
        
        $order_number = "";
        try {
            date_default_timezone_set(helper::appdata(Auth::user()->id)->timezone);
            $vendorinfo = User::where('id', Auth::user()->id)->first();
            $customerinfo = User::where('id',$request->customer)->first();
            
            if (Auth::user() && Auth::user()->type == 2) 
            {
                $data = Cart::where('vendor_id', Auth::user()->id)->where('session_id',Session::getId())->get();
            } 
           
            if($data->count() > 0)
            { 
                //payment_type = COD : 1, Online : 2
                $discount_amount =  $request->discount_amount;
                $payment_type = $request->payment_type;
                  
                $address = "";
                
                
                if ($discount_amount == "NaN") {
                    $discount_amount = 0;
                } else {
                    $discount_amount = $discount_amount;
                }
                
                $order_number = substr(str_shuffle(str_repeat("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ", 10)), 0, 10);
                $order = new Order;
                $order->vendor_id = Auth::user()->id;
                $order->order_number = $order_number;
                $order->payment_type = $payment_type;
               
                $order->sub_total = $request->sub_total;
                $order->tax = $request->tax;
                $order->delivery_date = date('Y-m-d');
                $order->grand_total = $request->grand_total;
                $order->status = '2';
                $order->address = $address;
                $order->discount_amount = $discount_amount; 
                $order->is_notification = '2';
               
                $order->order_type = $request->order_type;
                $order->order_from = 'pos';
                
    
                if(!empty($customerinfo))
                {
                    $order->customer_name = $customerinfo->name;
                    $order->customer_email = $customerinfo->email;
                    $order->mobile = $customerinfo->mobile;
                }
                else
                {
                    $order->customer_name = $request->customer;
                }
                
                
            
                $order->save();
                
                $order_id = DB::getPdo()->lastInsertId();
    
         
              
                foreach ($data as $value) {
                    
                    $OrderPro = new OrderDetails();
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
    
                if (Auth::user() && Auth::user()->type == 2) {
                    $data1 = Cart::where('vendor_id', Auth::user()->id)->where('session_id',Session::getId())->delete();
                } 
            
                
                $trackurl = URL::to(@$vendorinfo->slug . '/track-order/' . $order_number);
                
    
                
    
                $checkplan = Transaction::where('vendor_id', $vendorinfo->id)->orderByDesc('id')->first();
    
                if(!empty($checkplan)) {
                    if ($checkplan->appoinment_limit != -1) {
                        $checkplan->appoinment_limit -= 1;
                        $checkplan->save();
                    }
                }
                $cartitems = Cart::select('id', 'item_id', 'item_name', 'item_image', 'item_price', 'extras_id', 'extras_name', 'extras_price', 'qty', 'price', 'tax', 'variants_id', 'variants_name', 'variants_price')
                ->where('vendor_id', Auth::user()->id)->where('session_id',Session::getId())->orderByDesc('id')->get();
                $getcustomerslist = User::select('users.id','users.name','users.email','users.mobile','users.image')->join('orders', 'orders.user_id', '=', 'users.id')->where('orders.vendor_id', Auth::user()->id)->groupBy('orders.user_id')->get();
                $getorderdata = Order::where('order_number', $order_number)->first();
                if (empty($getorderdata)) {
                    abort(404);
                }
                $ordersdetails = OrderDetails::where('order_id', $getorderdata->id)->get();
                
                
                return view('admin.pos.cartview',compact('cartitems','getcustomerslist','customerinfo','ordersdetails','getorderdata'));
            }
            else
            {
                return response()->json(['status' => 0, 'message' => 'Cart Empty!!'], 200);
            }
           
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
