<?php
namespace App\Http\Controllers\addons;
use App\Http\Controllers\Controller;
use App\Models\CustomDomain;
use Illuminate\Http\Request;
use App\Models\Settings;
use Illuminate\Support\Facades\Auth;
use App\Helpers\helper;
class CustomdomainController extends Controller
{
    public function index(Request $request)
    {
        $customdomaindata = CustomDomain::with(['users'])->get();
        $domain = Customdomain::where('vendor_id',Auth::user()->id)->first();
        $setting = Settings::where('vendor_id',1)->first();
        return view('admin.customdomain.customdomain',compact('setting','domain','customdomaindata'));
    }
    public function add(Request $request)
    {
        return view('admin.customdomain.add');
    }
    public function save(Request $request)
    {
        $request->validate([
            'custom_domain' => 'required',
        ], [
            'custom_domain.required' => trans('messages.custom_domain_required'),
        ]);
        $customdomaindata = CustomDomain::where('vendor_id', Auth::user()->id)->first();
        if ($customdomaindata == "") {
            $customdomain = new CustomDomain;
            $customdomain->vendor_id = Auth::user()->id;
            $customdomain->requested_domain = $request->custom_domain;
            $customdomain->current_domain = helper::appdata(Auth::user()->id)->custom_domain;
            $customdomain->status = 1;
            $customdomain->save();
        } else {
            CustomDomain::where('id', $customdomaindata->id)->update(['requested_domain' => $request->custom_domain, 'current_domain' => $customdomaindata->current_domain,'status'=>1]);
        }
        Settings::where('vendor_id', Auth::user()->id)->update(['custom_domain' => $request->custom_domain]);
        return redirect('admin/custom_domain')->with('success', trans('messages.success'));
    }
    public function custom_domain(Request $request)
    {
        $request->validate([
            'cname_text' => 'required',
            'cname_title' => 'required',
        ], [
            "cname_text.required" => trans('messages.cname_text_required'),
            "cname_title.required" => trans('messages.cname_title_required'),
        ]);
        $settingsdata = Settings::where('vendor_id', Auth::user()->id)->first();
        $settingsdata->cname_text = $request->cname_text;
        $settingsdata->cname_title = $request->cname_title;
        $settingsdata->save();
        return redirect()->back()->with('success', trans('messages.success'));
    }
    public function status_update($id,$status)
    {
        $domainupdate = Customdomain::where('vendor_id', $id)->first();
        if ($domainupdate->status == "1") {
            
                Customdomain::where('vendor_id', $id)->update(['requested_domain' => '-', 'current_domain' => $domainupdate->requested_domain,'status'=>$status]);
                Settings::where('vendor_id', $domainupdate->vendor_id)->update(['custom_domain' => $domainupdate->requested_domain]);
        }
        else
        {
            Customdomain::where('vendor_id', $id)->update(['requested_domain' =>  $domainupdate->current_domain, 'current_domain' =>'-','status'=>$status]);
                Settings::where('vendor_id', $domainupdate->vendor_id)->update(['custom_domain' => '-']);
        }
            return redirect()->back()->with('success', trans('messages.success'));
       
    }
}
