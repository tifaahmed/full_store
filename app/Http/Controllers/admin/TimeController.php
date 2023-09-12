<?php
namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Timing;
use App\Models\Settings;
use Illuminate\Support\Facades\Auth;
class TimeController extends Controller
{
    public function index(){
        $gettime = Timing::where('vendor_id',Auth::user()->id)->get();
        $settingsdata = Settings::where('vendor_id', Auth::user()->id)->first();
        return view('admin.otherpages.time',compact('gettime','settingsdata'));
    }
    public function store(Request $request){
        $settingsdata = Settings::where('vendor_id', Auth::user()->id)->first();
        
        $settingsdata->interval_time = $request->interval_time;
        $settingsdata->interval_type = $request->interval_type;
        $settingsdata->save();
       
        $day = $request->day;
        $open_time = $request->open_time;
        $close_time = $request->close_time;
        $break_start = $request->break_start;
        $break_end = $request->break_end;
        $is_always_close = $request->is_always_close;
        foreach ($day as $key => $no) {
            $input['day'] = $no;
            if ($is_always_close[$key] == "2") {
                if ($open_time[$key] == "Closed") {
                    $input['open_time'] = "12:00 AM";
                } else {
                    $input['open_time'] = $open_time[$key];
                }
            } else {
                $input['open_time'] = "12:00 AM";
            }

            if ($is_always_close[$key] == "2") {
                if ($break_start[$key] == "Closed") {
                    $input['break_start'] = "12:00 AM";
                } else {
                    $input['break_start'] = $break_start[$key];
                }
            } else {
                $input['break_start'] = "12:00 AM";
            }
            if ($is_always_close[$key] == "2") {
                if ($break_end[$key] == "Closed") {
                    $input['break_end'] = "12:00 AM";
                } else {
                    $input['break_end'] = $break_end[$key];
                }
            } else {
                $input['break_end'] = "12:00 AM";
            }
            if ($is_always_close[$key] == "2") {
                if ($close_time[$key] == "Closed") {
                    $input['close_time'] = "11:59 PM";
                } else {
                    $input['close_time'] = $close_time[$key];
                }
            } else {
                $input['close_time'] = "11:59 PM";
            }
            $input['is_always_close'] = $is_always_close[$key];
            Timing::where('vendor_id', Auth::user()->id)->where('day', $no)->update($input);
        }
        return redirect()->back()->with('success_message', trans('messages.success'));
    }
}
