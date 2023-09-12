<?php
namespace App\Http\Controllers\Addons;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Analytics; 
use Illuminate\Support\Facades\Auth;
use Spatie\Analytics\Period;

class AnalyticsController extends Controller
{
    public function index(Request $request)
    {
        if($request->startdate == "") {
            $startdate = date('Y-m-d', strtotime('-15 days'));
            $enddate = date('Y-m-d');
        } else {
            $startdate = $request->startdate;
            $enddate = $request->enddate;
        }

        $maxResults = 10;
        // Visitors based on URL
        $totalVisitorsFromURL = Analytics::fetchTotalVisitorsFromURL(Period::days(7),$startdate,$enddate,Auth::user()->slug);
        $date = $totalVisitorsFromURL->pluck('date');
        $visitors = $totalVisitorsFromURL->pluck('visitors');
        $uniquevisitors = $totalVisitorsFromURL->pluck('uniquevisitors');

        // Country wise
        $topCountries = Analytics::fetchtopCountries(Period::days(7),$startdate,$enddate,Auth::user()->slug);
        $totalpageviewcountrywise = 0;
        foreach($topCountries->pluck('sessions') as $key=>$value)
        {
            $totalpageviewcountrywise+= $value;
        }

        // Device wise
        $topDevices = Analytics::fetchtopDevices(Period::days(7),$startdate,$enddate,Auth::user()->slug);
        $totaldevice = 0;
        foreach($topDevices->pluck('sessions') as $key=>$value)
        {
            $totaldevice+= $value;
        }

        // Operating System
        $topOS = Analytics::fetchtopOS(Period::days(7),$startdate,$enddate,Auth::user()->slug);
        $totalos = 0;
        foreach($topOS->pluck('sessions') as $key=>$value)
        {
            $totalos+= $value;
        }

        // Browsers wise
        $topBrowsers = Analytics::fetchTopBrowsers(Period::days(7),$startdate,$enddate,Auth::user()->slug);
        $totalbrowsers = 0;
        foreach($topBrowsers->pluck('sessions') as $key=>$value)
        {
            $totalbrowsers+= $value;
        }

        // Language
        $topLanguages = Analytics::fetchtopLanguages(Period::days(7),$startdate,$enddate,Auth::user()->slug);
        $totallanguages = 0;
        foreach($topLanguages->pluck('sessions') as $key=>$value)
        {
            $totallanguages+= $value;
        }

        return view('admin.analytics.index',compact('date', 'visitors','uniquevisitors','topCountries','totalpageviewcountrywise','topDevices','totaldevice','topOS','totalos','topBrowsers','totalbrowsers','topLanguages','totallanguages'));
    }
}
