<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Promotionalbanner;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class BannerController extends Controller
{
    public function index()
    {
        $getbannerlist = Banner::orderByDesc('id')->where('vendor_id', Auth::user()->id)->get();
        return view('admin.banner.banner', compact('getbannerlist'));
    }
    public function add()
    {
        return view('admin.banner.add');
    }
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image',
        ], [
            'image.required' => trans('messages.image_required'),
        ]);
        $image = 'banner-' . uniqid() . "." . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->move(storage_path('app/public/admin-assets/images/banners/'), $image);
        $banner = new Banner();
        $banner->vendor_id = Auth::user()->id;
        $banner->banner_image = $image;
        $banner->save();
        return redirect('admin/banner')->with('success', trans('messages.success'));
    }
    public function show($id)
    {
        $getbannerdata = Banner::where('id', $id)->first();
        return view('admin.banner.edit', compact('getbannerdata'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'required|image',
        ], [
                'image.required' => trans('messages.image_required'),
            ]);
        $banner = Banner::where('id', $id)->first();
        if ($request->has('image')) {
            if (file_exists(storage_path('app/public/admin-assets/images/banners/' . $banner->banner_image))) {
                unlink(storage_path('app/public/admin-assets/images/banners/' . $banner->banner_image));
            }
            $image = 'banner-' . uniqid() . "." . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(storage_path('app/public/admin-assets/images/banners/'), $image);
            $banner->banner_image = $image;
        }
        $banner->update();
        return redirect('admin/banner')->with('success', trans('messages.success'));
    }
    public function delete($id)
    {
        $banner = Banner::where('id', $id)->first();
        if (file_exists(storage_path('app/public/admin-assets/images/banners/' . $banner->banner_image))) {
            unlink(storage_path('app/public/admin-assets/images/banners/' . $banner->banner_image));
        }
        $banner->delete();
        return redirect()->back()->with('success', trans('messages.success'));
    }
    public function promotional_banner()
    {
        $getbannerlist = Promotionalbanner::with('vendor_info')->get();
        return view('admin.promotionalbanners.index',compact('getbannerlist'));
    }
    public function promotional_banneradd()
    {
        $vendors = User::where('is_available',1)->where('type',2)->get();
        return view('admin.promotionalbanners.add',compact('vendors'));
    }


    public function promotional_bannersave_banner(Request $request)
    {
        $request->validate([
            'image' => 'required|image',
        ], [
            'image.required' => trans('messages.image_required'),
        ]);
        $banner = new Promotionalbanner();
        if ($request->has('image')) {
            $image = 'promotion-' . uniqid() . "." . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(storage_path('app/public/admin-assets/images/banners/'), $image);
            $banner->image = $image;
        }
        $banner->vendor_id = $request->vendor;
        $banner->save();
        return redirect('admin/promotionalbanners')->with('success', trans('messages.success'));
    }


    public function promotional_banneredit(Request $request)
    {
        $vendors = User::where('is_available',1)->where('type',2)->get();
        $banner = Promotionalbanner::where('id',$request->id)->first();
        return view('admin.promotionalbanners.edit',compact('vendors','banner'));
    }
    public function promotional_bannerupdate(Request $request)
    {
        $banner = Promotionalbanner::where('id',$request->id)->first();
        if ($request->has('image')) {
            if (file_exists(storage_path('app/public/admin-assets/images/banners/' .$banner->image))) {
                unlink(storage_path('app/public/admin-assets/images/banners/' . $banner->image));
            }
            $image = 'promotion-' . uniqid() . "." . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(storage_path('app/public/admin-assets/images/banners/'), $image);
            $banner->image = $image;
        }
        $banner->vendor_id = $request->vendor;
        $banner->update();
        return redirect('admin/promotionalbanners')->with('success', trans('messages.success'));
    }
    public function promotional_bannerdelete(Request $request)
    {
        $banner = Promotionalbanner::where('id', $request->id)->first();
        if (file_exists(storage_path('app/public/admin-assets/images/banners/' .$banner->image))) {
            unlink(storage_path('app/public/admin-assets/images/banners/' . $banner->image));
        }
        $banner->delete();
        return redirect()->back()->with('success',trans('messages.success'));
    }
}