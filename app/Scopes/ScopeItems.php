<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Auth;

trait ScopeItems
{  
    // items / Items
    public function scopeItems(Builder $query,$filter){ 
        if ($filter) {
            if ( is_object($filter) || is_array($filter) ) 
            {
                return $query->whereIn('item_id',$filter);
            }
            else if (is_int($filter)) 
            {
                return $query->where('item_id',$filter);
            }
        }
        return  $query;
    }
}// used in Cart 