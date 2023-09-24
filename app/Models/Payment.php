<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';

    protected $fillable = [
        'vendor_id', // user_id
        'payment_name',
        'currency',
        'image',
        'public_key',
        'secret_key',
        'environment',
        'bank_name',
        'account_number',
        'account_holder_name',
        'bank_ifsc_code',
        'is_available',
        'is_activate',
    ];
}
