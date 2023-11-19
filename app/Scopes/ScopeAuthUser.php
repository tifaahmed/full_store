<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Auth;

trait ScopeAuthUser
{  
    // auth_user / AuthUser
    public function scopeAuthUser(Builder $query){ 
        return $query->where('user_id',Auth::user()->id);
    }
}
// used in Coupons - Item