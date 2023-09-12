<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Settings;
use App\Models\Transaction;
use App\Models\Footerfeatures;
use App\Models\City;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{

    public function settings_index(Request $request)
    {
        $settingdata = Settings::where('vendor_id', Auth::user()->id)->first();
        $theme = Transaction::select('themes_id')->where('vendor_id', Auth::user()->id)->orderByDesc('id')->first();
        $getfooterfeatures = Footerfeatures::where('vendor_id', Auth::user()->id)->get();
        $city = City::where('is_deleted', 2)->where('is_available', 1)->get();
        return view('admin.otherpages.settings', compact('settingdata', 'theme', 'getfooterfeatures', 'city'));
    }
    public function settings_update(Request $request)
    {

        $settingsdata = Settings::where('vendor_id', Auth::user()->id)->first();
        $userslug = User::where('id', Auth::user()->id)->first();
        if ($request->hasfile('banner')) {
            if ($settingsdata->banner != "default-banner.png" && file_exists(storage_path('app/public/admin-assets/images/banners/' . $settingsdata->banner))) {
                @unlink(storage_path('app/public/admin-assets/images/banners/' . $settingsdata->banner));
            }
            $banner = 'banner-' . uniqid() . '.' . $request->banner->getClientOriginalExtension();
            $request->file('banner')->move(storage_path('app/public/admin-assets/images/banners/'), $banner);
            $settingsdata->banner = $banner;
        }
        if ($request->hasfile('landin_page_cover_image')) {
        
            if ($settingsdata->cover_image != "cover.png" && file_exists(storage_path('app/public/admin-assets/images/coverimage/' . $settingsdata->cover_image))) {
                @unlink(storage_path('app/public/admin-assets/images/about/coverimage/' . $settingsdata->cover_image));
            }
            $coverimage = 'cover-' . uniqid() . '.' . $request->landin_page_cover_image->getClientOriginalExtension();
            $request->landin_page_cover_image->move(storage_path('app/public/admin-assets/images/coverimage/'), $coverimage);
            $settingsdata->cover_image = $coverimage;
        }

        if ($request->hasfile('subscribe_background')) {
          
            if ($settingsdata->subscribe_background != "default_subscriber.png" && file_exists(storage_path('app/public/admin-assets/images/subscribe/' . $settingsdata->subscribe_background))) {
                @unlink(storage_path('app/public/admin-assets/images/about/subscribe/' . $settingsdata->subscribe_background));
            }
            $subscribe_img = 'subscribe_bg-' . uniqid() . '.' . $request->subscribe_background->getClientOriginalExtension();
            $request->subscribe_background->move(storage_path('app/public/admin-assets/images/subscribe/'), $subscribe_img);
            $settingsdata->subscribe_background = $subscribe_img;
        }

        if ($request->hasfile('notification_sound')) {
            $request->validate([
                'notification_sound' => 'mimes:mp3',

            ]);
            if (file_exists(storage_path('app/public/admin-assets/notification/' . $settingsdata->notification_sound))) {
                @unlink(storage_path('app/public/admin-assets/notification/' . $settingsdata->notification_sound));
            }
            $sound = 'audio-' . uniqid() . '.' . $request->notification_sound->getClientOriginalExtension();
            $request->notification_sound->move(storage_path('app/public/admin-assets/notification/'), $sound);
            $settingsdata->notification_sound = $sound;
        }
        $settingsdata->currency = $request->currency;
        $settingsdata->currency_position = $request->currency_position == 1 ? 'left' : 'right';
        $settingsdata->maintenance_mode = isset($request->maintenance_mode) ? 1 : 2;
        $settingsdata->timezone = $request->timezone;
        $settingsdata->firebase = '';
        $settingsdata->copyright = $request->copyright;
        $settingsdata->website_title = $request->website_title;
        $settingsdata->description = $request->description;
        
        if ($request->delivery_type != null) {
            $settingsdata->delivery_type = implode(",", $request->delivery_type);
        }
    
        if (Auth::user()->type == 2) {
            $settingsdata->checkout_login_required = isset($request->checkout_login_required) ? 1 : 2;
            $settingsdata->email = $request->email;
            $settingsdata->address = $request->address;
            $settingsdata->facebook_link = $request->facebook_link;
            $settingsdata->twitter_link = $request->twitter_link;
            $settingsdata->instagram_link = $request->instagram_link;
            $settingsdata->linkedin_link = $request->linkedin_link;
            if(!empty( $request->slug))
            {
                $userslug->slug = $request->slug;
                $userslug->update();
            }
            
        }
        if (!empty($request->feature_icon)) {
            foreach ($request->feature_icon as $key => $icon) {
                if (!empty($icon) && !empty($request->feature_title[$key]) && !empty($request->feature_description[$key])) {
                    $feature = new Footerfeatures;
                    $feature->vendor_id = Auth::user()->id;
                    $feature->icon = $icon;
                    $feature->title = $request->feature_title[$key];
                    $feature->description = $request->feature_description[$key];
                    $feature->save();
                }
            }
        }
        if (!empty($request->edit_icon_key)) {
            foreach ($request->edit_icon_key as $key => $id) {
                $feature = Footerfeatures::find($id);
                $feature->icon = $request->edi_feature_icon[$id];
                $feature->title = $request->edi_feature_title[$id];
                $feature->description = $request->edi_feature_description[$id];
                $feature->save();
            }
        }
        $settingsdata->save();

        return redirect()->back()->with('success', trans('messages.success'));
    }
    public function settings_updatetheme(Request $request)
    {
        $settingsdata = Settings::where('vendor_id', Auth::user()->id)->first();
        $settingsdata->primary_color = $request->primary_color;
        $settingsdata->secondary_color = $request->secondary_color;
        $settingsdata->template = !empty($request->template) ? $request->template : 1;
        $settingsdata->template_type = !empty($request->template_type) ? $request->template_type : 1;
        if ($request->hasfile('logo')) {
           
            if ($settingsdata->logo != "default-logo.png" && $settingsdata->logo != "" && file_exists(storage_path('app/public/admin-assets/images/about/logo/' . $settingsdata->logo))) {
                unlink(storage_path('app/public/admin-assets/images/about/logo/' . $settingsdata->logo));
            }
            $logo_name = 'logo-' . uniqid() . '.' . $request->logo->getClientOriginalExtension();
            $request->file('logo')->move(storage_path('app/public/admin-assets/images/about/logo/'), $logo_name);
            $settingsdata->logo = $logo_name;
        }
        if ($request->hasfile('favicon')) {
           
            if ($settingsdata->favicon != "default_favicon.png" && $settingsdata->favicon != "" && file_exists(storage_path('app/public/admin-assets/images/about/favicon/' . $settingsdata->favicon))) {
                unlink(storage_path('app/public/admin-assets/images/about/favicon/' . $settingsdata->favicon));
            }
            $favicon_name = 'favicon-' . uniqid() . '.' . $request->favicon->getClientOriginalExtension();
            $request->favicon->move(storage_path('app/public/admin-assets/images/about/favicon/'), $favicon_name);
            $settingsdata->favicon = $favicon_name;
        }
        $settingsdata->save();
        return redirect()->back()->with('success', trans('messages.success'));
    }
    public function settings_updateseo(Request $request)
    {
        $settingsdata = Settings::where('vendor_id', Auth::user()->id)->first();
        $settingsdata->meta_title = $request->meta_title;
        $settingsdata->meta_description = $request->meta_description;
        if ($request->hasfile('og_image')) {
            if ($settingsdata->og_image != "" && file_exists(storage_path('app/public/admin-assets/images/about/og_image/' . $settingsdata->og_image))) {
                unlink(storage_path('app/public/admin-assets/images/about/og_image/' . $settingsdata->og_image));
            }
            $image = 'og_image-' . uniqid() . '.' . $request->og_image->getClientOriginalExtension();
            $request->og_image->move(storage_path('app/public/admin-assets/images/about/og_image/'), $image);
            $settingsdata->og_image = $image;
        }
        $settingsdata->save();
        return redirect()->back()->with('success', trans('messages.success'));
    }
    public function landingsettings(Request $request)
    {
        $settingsdata = Settings::where('vendor_id', Auth::user()->id)->first();
        $settingsdata->primary_color = $request->landing_primary_color;
        $settingsdata->secondary_color = $request->landing_secondary_color;
        $settingsdata->email = $request->landing_email;
        $settingsdata->contact = $request->landing_mobile;
        $settingsdata->address = $request->landing_address;
        $settingsdata->facebook_link = $request->landing_facebook_link;
        $settingsdata->twitter_link = $request->landing_twitter_link;
        $settingsdata->instagram_link = $request->landing_instagram_link;
        $settingsdata->linkedin_link = $request->landing_linkedin_link;
        $settingsdata->landing_website_title = $request->landing_website_title;
        if ($request->hasfile('logo')) {
        
            if ($settingsdata->logo != "default-logo.png" && $settingsdata->logo != "" && file_exists(storage_path('app/public/admin-assets/images/about/logo/' . $settingsdata->logo))) {
                unlink(storage_path('app/public/admin-assets/images/about/logo/' . $settingsdata->logo));
            }
            $logo_name = 'logo-' . uniqid() . '.' . $request->logo->getClientOriginalExtension();
            $request->file('logo')->move(storage_path('app/public/admin-assets/images/about/logo/'), $logo_name);
            $settingsdata->logo = $logo_name;
        }
        if ($request->hasfile('favicon')) {
           
            if ($settingsdata->favicon != "default-favicon.png" && $settingsdata->favicon != "" && file_exists(storage_path('app/public/admin-assets/images/about/favicon/' . $settingsdata->favicon))) {
                unlink(storage_path('app/public/admin-assets/images/about/favicon/' . $settingsdata->favicon));
            }
            $favicon_name = 'favicon-' . uniqid() . '.' . $request->favicon->getClientOriginalExtension();
            $request->favicon->move(storage_path('app/public/admin-assets/images/about/favicon/'), $favicon_name);
            $settingsdata->favicon = $favicon_name;
        }

        $settingsdata->save();
        return redirect()->back()->with('success', trans('messages.success'));
    }
    public function settings_updateanalytics(Request $request)
    {
        $settingsdata = Settings::where('vendor_id', Auth::user()->id)->first();
        $settingsdata->tracking_id = $request->tracking_id;
        $settingsdata->view_id = $request->view_id;
        $settingsdata->save();
        return redirect()->back()->with('success', trans('messages.success'));
    }
    public function settings_updatecustomedomain(Request $request)
    {
        
        $settingsdata = Settings::where('vendor_id', Auth::user()->id)->first();
        $settingsdata->cname_title = $request->cname_title;
        $settingsdata->cname_text = $request->cname_text;
        $settingsdata->save();
        return redirect()->back()->with('success', trans('messages.success'));
    }
    public function delete_feature(Request $request)
    {
        Footerfeatures::where('id', $request->id)->delete();

        return redirect()->back()->with('success', trans('messages.success'));
    }
    public function delete_viewall_page_image(Request $request)
    {
        $settingsdata = Settings::where('vendor_id', Auth::user()->id)->first();
        if (!empty($settingsdata)) {
            if (!empty($settingsdata->viewallpage_banner) && file_exists(storage_path('app/public/admin-assets/images/about/viewallpage_banner/' . $settingsdata->viewallpage_banner))) {
                unlink(storage_path('app/public/admin-assets/images/about/viewallpage_banner/' . $settingsdata->viewallpage_banner));
            }
            $settingsdata->viewallpage_banner = "";
            $settingsdata->update();
            return redirect('admin/settings')->with('success', trans('messages.success'));
        }
        return redirect('admin/settings');
    }   
}
