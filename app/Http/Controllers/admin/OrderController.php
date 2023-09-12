<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\helper;
use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Config;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $getorders = Order::where('vendor_id', Auth::user()->id);
        if ($request->has('status') && $request->status != "") {
            if ($request->status == "processing") {
                $getorders = $getorders->whereIn('status', array(1,2));
            }
            if ($request->status == "cancelled") {
                $getorders = $getorders->whereIn('status', array(3,4));
            }
           
            if ($request->status == "delivered") {
                $getorders = $getorders->where('status', 5);
            }
        }
        $totalorders = Order::where('vendor_id', Auth::user()->id)->count();
        $totalprocessing = Order::whereIn('status', array(1,2))->where('vendor_id', Auth::user()->id)->count();
        $totalrevenue = Order::where('vendor_id', Auth::user()->id)->where('status', 5)->sum('grand_total');
        $totalcompleted = Order::where('status', 5)->where('vendor_id', Auth::user()->id)->count();
        $totalcancelled = Order::whereIn('status', array(3, 4))->where('vendor_id', Auth::user()->id)->count();
        if (!empty($request->startdate) && !empty($request->enddate)) {
            $totalorders = Order::where('vendor_id', Auth::user()->id)->whereBetween('created_at', [$request->startdate, $request->enddate])->count();
            $getorders = $getorders->whereBetween('created_at', [$request->startdate, $request->enddate]);
            $totalprocessing = Order::whereIn('status', array(1,2))->where('vendor_id', Auth::user()->id)->whereBetween('created_at', [$request->startdate, $request->enddate])->count();
            $totalrevenue = Order::where('status', 5)->where('vendor_id', Auth::user()->id)->whereBetween('created_at', [$request->startdate, $request->enddate])->sum('grand_total');
            $totalcompleted = Order::where('status', 5)->where('vendor_id', Auth::user()->id)->whereBetween('created_at', [$request->startdate, $request->enddate])->count();
            $totalcancelled = Order::whereIn('status', array(3, 4))->where('vendor_id', Auth::user()->id)->whereBetween('created_at', [$request->startdate, $request->enddate])->count();
        }
        $getorders = $getorders->orderByDesc('id')->get();
        return view('admin.orders.index', compact('getorders', 'totalorders', 'totalprocessing', 'totalcompleted', 'totalcancelled', 'totalrevenue'));
    }
    public function update(Request $request)
    {
        $orderdata = Order::find($request->id);
        if (empty($orderdata) || !in_array($request->status, [2, 3, 5])) {
            abort(404);
        }
        $title = "";
        $message_text = "";
        if ($request->status == "2") {
            $title = trans('labels.order_confirmed');
            $message_text = 'Your Order ' . $orderdata->order_number . ' has been accepted by Admin';
        }
        if ($request->status == "5") {
            $title = trans('labels.order_delivered');
            $message_text = 'Your Order ' . $orderdata->order_number . ' has been successfully delivered.';
        }
        if ($request->status == "3") {
            $title = trans('labels.order_cancelled');
            $message_text = 'Order ' . $orderdata->order_number . ' has been cancelled by Admin.';
        }
        $emaildata = helper::emailconfigration(helper::appdata('')->id);
        
        Config::set('mail', $emaildata);
        helper::order_status_email($orderdata->customer_email, $orderdata->customer_name, $title, $message_text, $orderdata->vendor_id);
        $orderdata->status = $request->status;
        $orderdata->save();
        return redirect()->back()->with('success', trans('messages.success'));
    }
    public function invoice(Request $request)
    {
        $getorderdata = Order::with('tableqr')->where('order_number', $request->order_number)->first();
        if (empty($getorderdata)) {
            abort(404);
        }
        $ordersdetails = OrderDetails::where('order_id', $getorderdata->id)->get();
        return view('admin.orders.invoice', compact('getorderdata', 'ordersdetails'));
    }
    public function print(Request $request)
    {
        $getorderdata = Order::where('order_number', $request->order_number)->first();
        if (empty($getorderdata)) {
            abort(404);
        }
        $ordersdetails = OrderDetails::where('order_id', $getorderdata->id)->get();
        return view('admin.orders.print', compact('getorderdata', 'ordersdetails'));
    }

    
}