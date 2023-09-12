<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings;
use App\Helpers\helper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Config;
class EmailSettingsController extends Controller
{
    public function emailsettings(Request $request)
    {
        if(Auth::user()->type == 2)
        {
            $settingsdata = Settings::where('vendor_id', Auth::user()->id)->first();
        }
        else
        {
            $settingsdata = Settings::first();
        }
        $settingsdata->mail_driver = $request->mail_driver;
        $settingsdata->mail_host = $request->mail_host;
        $settingsdata->mail_port = $request->mail_port;
        $settingsdata->mail_username = $request->mail_username;
        $settingsdata->mail_password = $request->mail_password;
        $settingsdata->mail_encryption = $request->mail_encryption;
        $settingsdata->mail_fromaddress = $request->mail_fromaddress;
        $settingsdata->mail_fromname = $request->mail_fromname;
        $settingsdata->save();


        return redirect()->back()->with('success', trans('messages.success'));
    }


    public function testmail(Request $request)
    {
        try {
            $vendor_id = Auth::user()->id;
            $data = ['title' => "Congratulations! Successful SMTP Email Configuration", 'vendor_email' => $request->email_address, 'vendor_name' => Auth::user()->name,'msg' => "I am delighted to inform you that your SMTP email configuration has been successfully set up! Congratulations on this achievement!"];
            $emaildata = helper::emailconfigration($vendor_id);
            if ($emaildata->username == "") {
                return redirect()->back()->with('error', trans('messages.wrong'));
            }
            Config::set('mail',$emaildata);
            Mail::send('email.testemail', $data, function ($message) use ($data) {
                $message->to($data['vendor_email'])->subject($data['title']);
            });
            return redirect()->back()->with('success', trans('messages.success'));
        } catch (\Exception $th) {
            return redirect()->back()->with('error', trans('messages.wrong'));
        }
    }
}
