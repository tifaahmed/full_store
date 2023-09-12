<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'payment_name', 'test_public_key','test_secret_key','live_public_key','live_secret_key','environment','status'
    ];
}
