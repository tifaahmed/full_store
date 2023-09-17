<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Scopes\ScopeAuthVendor; // auth_vendor

class Order extends Model
{
    use HasFactory , ScopeAuthVendor;
    protected $table = 'orders';

    public function vendorinfo()
    {
        return $this->hasOne('App\Models\User', 'id', 'vendor_id')->select('id', 'name');
    }

    public function tableqr()
    {
        return $this->hasOne('App\Models\TableQR', 'id', 'table_id');
    }
}
