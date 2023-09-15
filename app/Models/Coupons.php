<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupons extends Model
{
    use HasFactory;
    protected $table = 'coupons';

    // belongsToMany    
        public function items(){
            return $this->belongsToMany(Item::class, CouponItem::class, 'coupon_id', 'item_id');
        }  
}
