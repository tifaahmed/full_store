<?php

namespace App\Scopes;

use Carbon\Carbon;

trait ScopeTimeFilter
{  
    // if admin login to another vendor hes (Auth::user()->id) changed
    // time_filter / TimeFilter
    public function scopeTimeFilter($query){ 
        $currentTime = Carbon::now()->format('H:i:s');

        return $query
        ->whereTime('start_time', '<=', $currentTime)
        ->whereTime('end_time', '>=', $currentTime);
    }
}
// used in Coupons - Item