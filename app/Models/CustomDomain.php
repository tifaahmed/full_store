<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CustomDomain extends Model
{
    use HasFactory;
    protected $table = 'custom_domain';

    public function users(){
        return $this->hasOne('App\Models\User','id','vendor_id')->select('id','name','email','mobile');
    }
}
