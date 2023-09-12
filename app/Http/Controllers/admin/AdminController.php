<?php
namespace App\Http\Controllers\admin;

use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\PricingPlan;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use App\Helpers\helper;
use Session;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        // Admin
        $totalplans = PricingPlan::count();
        // Vendor-Admin
        $currentplanname = PricingPlan::select('name')->where('id', Auth::user()->plan_id)->orderByDesc('id')->first();
        // ----------------------- chart -----------------------
        $doughnutyear = $request->doughnutyear != "" ? $request->doughnutyear : date('Y');
        $revenueyear = $request->revenueyear != "" ? $request->revenueyear : date('Y');
        if (Auth::user()->type == 1) {
            $totalvendors = User::where('type', 2)->count();
            $totalrevenue = Transaction::where('status',2)->sum('amount');
            $totalorders = Transaction::count('id');
            // DOUGHNUT-CHART-START
            $doughnut_years = User::select(DB::raw("YEAR(created_at) as year"))->where('type', 2)->groupBy(DB::raw("YEAR(created_at)"))->orderByDesc('created_at')->get();
            $vendorlist = User::select(DB::raw("YEAR(created_at) as year"), DB::raw("MONTHNAME(created_at) as month_name"), DB::raw("COUNT(id) as total_user"))->whereYear('created_at', $doughnutyear)->where('type', 2)->orderBy('created_at')->groupBy(DB::raw("MONTHNAME(created_at)"))->pluck('total_user', 'month_name');
            $doughnutlabels = $vendorlist->keys();
            $doughnutdata = $vendorlist->values();
            // DOUGHNUT-CHART-END
            // revenue-CHART-START
            $revenue_years = Transaction::select(DB::raw("YEAR(purchase_date) as year"))->groupBy(DB::raw("YEAR(purchase_date)"))->orderByDesc('purchase_date')->get();
            $revenue_list = Transaction::select(DB::raw("YEAR(purchase_date) as year"), DB::raw("MONTHNAME(purchase_date) as month_name"), DB::raw("SUM(amount) as total_amount"))->whereYear('purchase_date', $revenueyear)->where('status', 2)->orderby('purchase_date')->groupBy(DB::raw("MONTHNAME(purchase_date)"))->pluck('total_amount', 'month_name');
            $revenuelabels = $revenue_list->keys();
            $revenuedata = $revenue_list->values();
            // revenue-CHART-END
            $transaction = Transaction::with('vendor_info')->whereDate('created_at', Carbon::today())->get();
            $getorders = array();
        } else {
            $totalvendors = Item::where('vendor_id',Auth::user()->id)->count();
            $totalrevenue = Order::where('vendor_id',Auth::user()->id)->where('status',5)->sum('grand_total');
            $totalorders = Order::where('vendor_id', Auth::user()->id)->count();
            // DOUGHNUT-CHART-START
            $doughnut_years = $revenue_years = Order::select(DB::raw("YEAR(created_at) as year"))->groupBy(DB::raw("YEAR(created_at)"))->orderByDesc('created_at')->get();
            $orderlist = Order::select(DB::raw("YEAR(created_at) as year"), DB::raw("MONTHNAME(created_at) as month_name"), DB::raw("COUNT(id) as total_orders"))->whereYear('created_at', $doughnutyear)->orderBy('created_at')->where('vendor_id', Auth::user()->id)->groupBy(DB::raw("MONTHNAME(created_at)"))->pluck('total_orders', 'month_name');
            $doughnutlabels = $orderlist->keys();
            $doughnutdata = $orderlist->values();
            // DOUGHNUT-CHART-END
            // revenue-CHART-START
            $revenue_list = Order::select(DB::raw("YEAR(created_at) as year"), DB::raw("MONTHNAME(created_at) as month_name"), DB::raw("SUM(grand_total) as total_amount"))->whereYear('created_at', $revenueyear)->orderBy('created_at')->where('vendor_id', Auth::user()->id)->groupBy(DB::raw("MONTHNAME(created_at)"))->pluck('total_amount', 'month_name');
            $revenuelabels = $revenue_list->keys();
            $revenuedata = $revenue_list->values();
            // revenue-CHART-END
            $transaction = array();
            $getorders = order::select("id","order_number","grand_total","order_type","payment_type","payment_id","delivery_date","delivery_time","status",DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as order_date'))->where('vendor_id', Auth::user()->id)->whereIn('status',[1, 2])->orderByDesc('id')->get();
        }
        if (env('Environment') == 'sendbox') {
            $doughnutlabels = ['January','February','March','April','May','June','July ','August','September','October','November','December'];
            $doughnutdata = [636, 1269, 2810, 2843, 3637, 467, 902, 1296, 402, 1173, 1509, 413];
            $revenuelabels = ['January','February','March','April','May','June','July ','August','September','October','November','December'];
            $revenuedata = [636, 1269, 2810, 2843, 3637, 467, 902, 1296, 402, 1173, 1509, 413];
        } 
        if ($request->ajax()) {
            return response()->json([
                'doughnutlabels' => $doughnutlabels,
                'doughnutdata' => $doughnutdata,
                'revenuelabels' => $revenuelabels,
                'revenuedata' => $revenuedata
            ], 200);
        } else {
            return view(
                'admin.dashboard.index',
                compact(
                    'totalvendors',
                    'totalplans',
                    'totalorders',
                    'totalrevenue',
                    'currentplanname',
                    'doughnut_years',
                    'doughnutlabels',
                    'doughnutdata',
                    'revenue_years',
                    'revenuelabels',
                    'revenuedata',
                    'transaction',
                    'getorders'
                )
            );
        }
    }
    public function login()
    {
        Helper::language();
        return view('admin.auth.login');
    }

    public function check_admin_login(Request $request)
    {
        session()->put('admin_login', 1);
        if (Auth::attempt($request->only('email', 'password'))) {
            if (!Auth::user()) {
                return Redirect::to('/admin/verification')->with('error', Session()->get('from_message'));
            }
            if (Auth::user()->type == 1) {
                return redirect('/admin/dashboard');
            } else {
                if (Auth::user()->type == 2) {
                    if (Auth::user()->is_available == 1) {
                        return redirect('/admin/dashboard');
                    } else {
                        Auth::logout();
                        return redirect()->back()->with('error', trans('messages.block'));
                    }
                } else {
                    Auth::logout();
                    return redirect()->back()->with('error', trans('messages.email_pass_invalid'));
                }
            }
        } else {
            return redirect()->back()->with('error', trans('messages.email_pass_invalid'));
        }
    }
    public function logout()
    {
        session()->flush();
        Auth::logout();
        return redirect('admin');
    }
    public function systemverification(Request $request)
    {
        $username = str_replace(' ','',$request->username);
        $client = new \GuzzleHttp\Client();
        $res = $client->request('POST', \Illuminate\Support\Facades\Crypt::decrypt('eyJpdiI6IjROM1c4b3FrL0VSeHJwcVpSaThTNGc9PSIsInZhbHVlIjoiVjUxamZBNUpteEFweDlPZ2ZUSWUrMUNNYmFnL2pjZEZ4NjcvWEo0eDRmaEhQZHhQeDhkODdRVW16aDFBVzRsUUs2blFhdUt2RzlLc01KZnM3aGlhTEE9PSIsIm1hYyI6IjRmZDFmMGYzYjA0YzU4ZDBhMGI3YmEzMGYzOTgwNGNiMDhkZDU1MzlhNjgwY2UzYWUwNmE3YWFlOGRkMzViOGUiLCJ0YWciOiIifQ=='), [
            'form_params' => [
                \Illuminate\Support\Facades\Crypt::decrypt('eyJpdiI6ImJkS3crTk9COHRYL0tQK2kxRERNQXc9PSIsInZhbHVlIjoiU0NIcmkrT2xJdkppcnJ5cFY4OW5XWllud3c4Z3QyaGVHK0hYVVUyNnc3UT0iLCJtYWMiOiI0Njg1NTcwNTAxNTI0ODFmZDE0Y2FmMWU4M2M3ZGFkZThjNDgxZWZlNTY1ZmVkOTdiNGZjM2VkNDI5MmI2NTljIiwidGFnIjoiIn0=') => $username,
                \Illuminate\Support\Facades\Crypt::decrypt('eyJpdiI6ImU5NjI5NFRTQXRWeTRHQndWVHJsUXc9PSIsInZhbHVlIjoiNHpzaHFCVjc0ajVKMktNampzN0NvUT09IiwibWFjIjoiODU5M2M0Y2VhMDE5YjgyNzU5MWE4NzZjOGUxNjlkZWFhMWI0ZjJiYTU2YTQ1NTMwYzI4YjBhMjg5Y2VhNzNiYiIsInRhZyI6IiJ9') => $request->email,
                \Illuminate\Support\Facades\Crypt::decrypt('eyJpdiI6IkxHVHdQNGo0Vzd1TktaS21kZEQwL1E9PSIsInZhbHVlIjoiRDEvUGZZa3MzbkkzQ0pxUFlrRFJOektiU1FLN3YvZ3ZHK25UcE95UHFzdz0iLCJtYWMiOiI5NWJlNDVmM2VkNWViZDYxNTIwNGI1MWI0ZTU0YWEzN2VkNjhhZDZlM2QwOWMyOGY5OTFkYTY5ODVkNWY2NDdiIiwidGFnIjoiIn0=') =>$request->purchase_key,
                \Illuminate\Support\Facades\Crypt::decrypt('eyJpdiI6IlRTOCtHbEI3Slh3Wm1sWHRCNWM2SWc9PSIsInZhbHVlIjoiNGxHU2puYjdnaCtUUVhJeFVNa014dz09IiwibWFjIjoiNzY4ZjI2MjZmZTVjMjI1NTZhNGZjMjNjYjE4M2MyODUxOTkwNWE2NjA1MjI3NTRiOTViMDY3Zjc3OTEzYWY2NSIsInRhZyI6IiJ9') =>$request->domain,
                \Illuminate\Support\Facades\Crypt::decrypt('^ "eyJpdiI6IlZSSHhaNC8rOFVHRHNsdXVseDZRTGc9PSIsInZhbHVlIjoieGp2aEFLOU85OGdPeUNDck9TeUg2WW12Y3d4L3AyeHNwRXh5dXN2UTRJVT0iLCJtYWMiOiI2NzE3NmIxM2M3YzgzM2JjMDkyMjMyMGUwODFhZDA3NzVhZDI4YmJjMDk4NzJiYmI1M2NkZWRmZTZhNzZhZWM0IiwidGFnIjoiIn0=') => \Illuminate\Support\Facades\Crypt::decrypt('eyJpdiI6IlVJVTlCMXozN3BtY1RHTUZIS2N3ZXc9PSIsInZhbHVlIjoicXIreUdDeXNMb2lIZUg1QUphM1lCdz09IiwibWFjIjoiMWM2NzEyOTYzNjNmMzIwY2NjZWY2NGY2ZDIxMzNiNDIxMWUyMzc2MGQ1ODQyMmVkNzlkYjcxZDM5ZGRiYzI5YiIsInRhZyI6IiJ9'),
                \Illuminate\Support\Facades\Crypt::decrypt('eyJpdiI6Ii9xbk0yamJvZTVRdXFUY1FPaE5DZ2c9PSIsInZhbHVlIjoidVJJUk5YZzMxc2VCOFVjUFJsZ2hCUT09IiwibWFjIjoiZjM5MzkxOWIxNmE5NWQxMzljMDZlNGVhZThlNWVmYmY2MzFkMmU5NDUxNmRiMTRkNWRjNGJmY2I5YzNhZDA3ZCIsInRhZyI6IiJ9') =>\Illuminate\Support\Facades\Crypt::decrypt('eyJpdiI6IjJ2WmlxOHJBNzk2LzU0aENVMjJPemc9PSIsInZhbHVlIjoiUEF4Z1IrMjl1SkRGbzZFdXhSVG9wdz09IiwibWFjIjoiODM4YjgyMWYyZDY4NGMxODNjNmRiY2ExNWU4MzkzNWJlZGI1MjU3MjEwODFjMDA0NzY5YTZmNDJkNDZlY2Q5MiIsInRhZyI6IiJ9'),
            ]
        ]);

        $obj = json_decode($res->getBody());
        
        if ($obj->status == '1') {
            User::where('id', 1)->update(['license_type' => @$obj->license_type]);
            return Redirect::to('/admin')->with('success', 'Success');
        } else {
            return Redirect::back()->with('error', $obj->message);
        }

    }
}