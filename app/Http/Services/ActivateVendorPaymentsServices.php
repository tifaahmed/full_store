<?php

namespace App\Http\Services;

use App\Models\Payment;

class ActivateVendorPaymentsServices
{
    public function activateVendorPayments(){
        $admin_payments = Payment::where('vendor_id',1)->get();
        foreach ($admin_payments as $admin_payment) {
            $vendor_payments = Payment::where('vendor_id','!=',1)->
            where('payment_name',$admin_payment->payment_name)->get();
            foreach ($vendor_payments as $vendor_payment) {
                $vendor_payment->update([
                    'is_activate'=>$admin_payment->is_available
                ]);
            }
        }
    } 
}
