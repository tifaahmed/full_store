<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
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
