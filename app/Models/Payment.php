<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'vendor_id',
        'payment_name', 
        'currency',
        'image',
        'public_key',
        'secret_key',
        'encryption_key',
        'environment',
        'bank_name',
        'account_number',
        'account_number',
        'account_holder_name',
        'bank_ifsc_code',
        'is_available',
        'is_activate',
     ];

    
    public function getPaymentNameModifiedAttribute() { // payment_name_modified PaymentNameModified 
        if ($this->payment_name == 'COD') {
            return 'cash';
        }
        else if($this->payment_name == 'MyFatoorah'){
            return 'K-net';

        }else{
            return $this->payment_name;
        }
        
    }
}
