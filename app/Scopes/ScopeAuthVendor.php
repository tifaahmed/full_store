<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Auth;

trait ScopeAuthVendor
{  
    // if admin login to another vendor hes (Auth::user()->id) changed
    // auth_vendor / AuthVendor
    public function scopeAuthVendor(Builder $query){ 
        return $query->where('vendor_id',Auth::user()->id);
    }
}