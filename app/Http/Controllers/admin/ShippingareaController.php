<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DeliveryArea;
use Illuminate\Support\Facades\Auth;
class ShippingareaController extends Controller
{
    public function index(){
        $getshippingarealist = DeliveryArea::where('vendor_id',Auth::user()->id)->orderByDesc('id')->get();
        return view('admin.shippingarea.index',compact('getshippingarealist'));
    }
    public function add(){
        return view('admin.shippingarea.add');
    }
    public function show(Request $request){
        $shippingareadata = DeliveryArea::find($request->id);
        return view('admin.shippingarea.show',compact('shippingareadata'));
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'price' => 'required',
        ],[
            'name.required' => trans('messages.name_required'),
            'price.required' => trans('messages.price_required'),
        ]);
        $shippingarea = DeliveryArea::find($request->id);
        if(empty($shippingarea)){
            $shippingarea = new DeliveryArea();
            $shippingarea->vendor_id = Auth::user()->id;
        }
        $shippingarea->name = $request->name;
        $shippingarea->price = $request->price;
        $shippingarea->save();
        return redirect('/admin/shipping-area')->with('success',trans('messages.success'));
    }
    public function delete(Request $request){
        try {
            $shippingareadata = DeliveryArea::find($request->id);
            $shippingareadata->delete();
            return redirect('/admin/shipping-area')->with('success',trans('messages.success'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',trans('messages.wrong'));
        }
    }
}