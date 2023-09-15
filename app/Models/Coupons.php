<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\ScopeAuthVendor; // auth_vendor

class Coupons extends Model
{
    use HasFactory , ScopeAuthVendor;
    protected $table = 'coupons';
    protected $fillable=[
        'vendor_id',
        'name',
        'code',
        'type',
        'price	',
        'active_from',
        'active_to',
        'limit',
    ]; 

    // belongsToMany    
        public function items(){
            return $this->belongsToMany(Item::class, CouponItem::class, 'coupon_id', 'item_id');
        }  
}
