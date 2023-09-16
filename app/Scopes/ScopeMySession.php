<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Auth;

trait ScopeMySession
{  
    // my_session / MySession
    public function scopeMySession(Builder $query){ 
        $session_id = session()->getId();
        return $query->where('session_id',$session_id);
    }
}// used in Cart 