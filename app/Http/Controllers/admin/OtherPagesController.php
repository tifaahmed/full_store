<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Privacypolicy;
use App\Models\Terms;
use App\Models\About;
use App\Models\Areas;
use App\Models\Subscriber;
use App\Models\Country;
use App\Models\City;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Faq;
use App\Models\Contact;
use App\Models\RefundPrivacypolicy;

class OtherPagesController extends Controller
{
    public function share(){
        return view('admin.otherpages.share');
    }
    // -----------------------------------------------------------------
    // -------------------  Privacy-Policy  ----------------------------
    // -----------------------------------------------------------------
    public function privacypolicy(){
        $getprivacypolicy = Privacypolicy::where('vendor_id',Auth::user()->id)->first();
        return view('admin.otherpages.privacypolicy',compact('getprivacypolicy'));
    }
    public function privacypolicy_update(Request $request)
    {
        $privacypolicy = Privacypolicy::where('vendor_id',Auth::user()->id)->first();
        if(empty($privacypolicy)){
            $privacypolicy = new Privacypolicy();
            $privacypolicy->vendor_id = Auth::user()->id;
        }
        $privacypolicy->privacypolicy_content = $request->privacypolicy;
        $privacypolicy->save();
        return redirect('admin/privacy-policy')->with('success', trans('messages.success'));
    }
    // -----------------------------------------------------------------
    // ------------------- Refund Privacy-Policy  ----------------------------
    // -----------------------------------------------------------------
    public function refundpolicy(){
        $getrefundpolicy = RefundPrivacypolicy::where('vendor_id',Auth::user()->id)->first();
        return view('admin.otherpages.refund_privacypolicy',compact('getrefundpolicy'));
    }
    public function refundpolicy_update(Request $request)
    {
        $refundpolicy = RefundPrivacypolicy::where('vendor_id',Auth::user()->id)->first();
        if(empty($refundpolicy)){
            $refundpolicy = new RefundPrivacypolicy();
            $refundpolicy->vendor_id = Auth::user()->id;
        }
        $refundpolicy->refund_policy_content = $request->refundpolicy;
        $refundpolicy->save();
        return redirect('admin/refund-policy')->with('success', trans('messages.success'));
        
    }
    // -----------------------------------------------------------------
    // ------------------- Terms-Condition -----------------------------
    // -----------------------------------------------------------------
    public function termscondition(){
        $gettermscondition = Terms::where('vendor_id',Auth::user()->id)->first();
        return view('admin.otherpages.termscondition',compact('gettermscondition'));
    }
    public function termscondition_update(Request $request)
    {
        $termscondition = Terms::where('vendor_id',Auth::user()->id)->first();
        if(empty($termscondition)){
            $termscondition = new Terms();
            $termscondition->vendor_id = Auth::user()->id;
        }
        $termscondition->terms_content = $request->termscondition;
        $termscondition->save();
        return redirect('admin/terms-conditions')->with('success', trans('messages.success'));  
    }
    // -----------------------------------------------------------------
    // ------------------- About us -----------------------------
    // -----------------------------------------------------------------
    public function aboutus(){
        $getaboutus = About::where('vendor_id',Auth::user()->id)->first();
        return view('admin.otherpages.aboutus',compact('getaboutus'));
    }
    public function aboutus_update(Request $request)
    {
       
        $aboutus = About::where('vendor_id',Auth::user()->id)->first();
        if(empty($aboutus)){
            $aboutus = new About();
            $aboutus->vendor_id = Auth::user()->id;
        }
        $aboutus->about_content = $request->aboutus;
        $aboutus->save();
        return redirect('admin/aboutus')->with('success', trans('messages.success'));
        
    }
    public function faq_index(Request $request)
    {
        $faqs = Faq::orderByDesc('id')->get();
        return view('admin.faqs.index', compact('faqs'));
    }
    public function faq_add(Request $request)
    {
        return view('admin.faqs.add');
    }
    public function faq_save(Request $request)
    {
        $faqs = new Faq();
        $faqs->vendor_id = Auth::user()->id;
        $faqs->question = $request->question;
        $faqs->answer = $request->answer;
        $faqs->save();
        return redirect('/admin/faqs')->with('success', trans('messages.success'));
    }
    public function faq_edit(Request $request)
    {
        $getfaq = Faq::where('id', $request->id)->first();
        return view('admin.faqs.edit', compact('getfaq'));
    }
    public function faq_update(Request $request)
    {   
        $getfaq = Faq::where('id', $request->id)->first();
        $getfaq->vendor_id = Auth::user()->id;
        $getfaq->question = $request->question;
        $getfaq->answer = $request->answer;
        $getfaq->update();
        return redirect('/admin/faqs')->with('success', trans('messages.success'));
    }
    public function faq_delete(Request $request)
    {
        $deletefaq = Faq::where('id', $request->id)->first();
        $deletefaq->delete();
        return redirect('/admin/faqs')->with('success', trans('messages.success'));
    }
    public function subscribers(Request $request)
    {
        $getsubscribers = Subscriber::where('vendor_id', Auth::user()->id)->orderByDesc('id')->get();
        return view('admin.subscriber.index', compact('getsubscribers'));
    }
    public function subscribers_delete(Request $request)
    {
        $subscriber = Subscriber::find($request->id);
        if (!empty($subscriber)) {
            $subscriber->delete();
            return redirect('/admin/subscribers')->with('success', trans('messages.success'));
        }
        return redirect('/admin/subscribers')->with('error', trans('messages.wrong'));
    }
    public function inquiries(Request $request)
    {
        $getinquiries = Contact::where('vendor_id', Auth::user()->id)->orderByDesc('id')->get();
        return view('admin.inquiries.index', compact('getinquiries'));
    }
    public function inquiries_delete(Request $request)
    {
        $inquiry = Contact::find($request->id);
        if (!empty($inquiry)) {
            $inquiry->delete();
            return redirect('/admin/inquiries')->with('success', trans('messages.success'));
        }
        return redirect('/admin/inquiries')->with('error', trans('messages.wrong'));
    }
    public function cities(Request $request)
    {
        $allcities = City::where('is_deleted',2)->get();
        return view('admin.city.index',compact('allcities'));
    }
    public function add_city(Request $request)
    {
        return view('admin.city.add');
    }
    public function save_city(Request $request)
    {
        $city = new City();
        $city->name = $request->name;
        $city->save();
        return redirect('/admin/cities')->with('success', trans('messages.success'));
    }
    public function edit_city(Request $request)
    {
        $editcity = City::where('id',$request->id)->first();
        return view('admin.city.edit',compact('editcity'));
    }
    public function update_city(Request $request)
    {
        $editcity = City::where('id',$request->id)->first();
        $editcity->name = $request->name;
        $editcity->update();
        return redirect('/admin/cities')->with('success', trans('messages.success'));
    }
    public function delete_city(Request $request)
    {
        $city = City::where('id',$request->id)->first();
        $city->is_deleted = 1;
        $city->update();
        return redirect('/admin/cities')->with('success', trans('messages.success'));
    }
    public function statuschange_city(Request $request)
    {
        $city = City::where('id',$request->id)->first();
        $city->is_available = $request->status;
        $city->update();
        return redirect('/admin/cities')->with('success', trans('messages.success'));
    }
    public function areas(Request $request)
    {
        $allareas = Areas::with('city_info')->where('is_deleted',2)->get();
        return view('admin.areas.index',compact('allareas'));
    }
    public function add_area(Request $request)
    {
        $allcity = City::where('is_deleted',2)->get();
        return view('admin.areas.add',compact('allcity'));
    }
    public function save_area(Request $request)
    {
        $area = new Areas();
        $area->city_id = $request->city;
        $area->area = $request->name;
        $area->save();
        return redirect('/admin/areas')->with('success', trans('messages.success'));
    }
    public function edit_area(Request $request)
    {
        $allcity = City::where('is_deleted',2)->get();
        $editarea = Areas::where('id',$request->id)->first();
        return view('admin.areas.edit',compact('editarea','allcity'));
    }
    public function update_area(Request $request)
    {
        $editarea = Areas::where('id',$request->id)->first();
        $editarea->city_id = $request->city;
        $editarea->area = $request->name;
        $editarea->update();
        return redirect('/admin/areas')->with('success', trans('messages.success'));
    }
    public function delete_area(Request $request)
    {
        $area = Areas::where('id',$request->id)->first();
        $area->is_deleted = 1;
        $area->update();
        return redirect('/admin/areas')->with('success', trans('messages.success'));
    }
    public function statuschange_area(Request $request)
    {
        $area = Areas::where('id',$request->id)->first();
        $area->is_available = $request->status;
        $area->update();
        return redirect('/admin/areas')->with('success', trans('messages.success'));
    }
}