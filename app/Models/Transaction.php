<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transactions';

    public function vendor_info(){
        return $this->hasOne('App\Models\User','id','vendor_id')->select('id','name','email','mobile');
    }
    public function plan_info()
    {
        return $this->hasOne('App\Models\PricingPlan','id','plan_id')->select('id','name','description','features');
    }

}
