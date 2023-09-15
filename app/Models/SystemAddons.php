<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SystemAddons extends Model
{
    protected $table='systemaddons';
    protected $fillable=[
        'name',                 // (string) to viewer addon name ex Google Analytics , Coupons
        'unique_identifier',    // (string) uniqe addon name ex google_analytics , coupon
        'version',              // (integer) ex 3.0
        'activated',            // (boolean) ex 1
        'image'                 // (string) to viewer addon image ex google_analytics.jpg , coupons.jpg
    ];
}