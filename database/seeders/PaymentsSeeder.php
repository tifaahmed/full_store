<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Payment;
use App\Models\User;

class PaymentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::get();
        foreach ($users as $key => $user) {
            $cod = Payment::where('payment_name','COD')
            ->where('vendor_id',$user->id)->first();
            if (!$cod) {
                Payment::create([
                    'vendor_id' =>  $user->id, 
                    'payment_name' =>  'COD',
                    'image' =>  'cod.png',
                    'environment' =>  1,
                    'is_available' =>  2,
                    'is_activate' =>  1,
                ]);
            }
            $razor_pay = Payment::where('payment_name','RazorPay')
            ->where('vendor_id',$user->id)->first();
            if (!$razor_pay) {
            Payment::create([
                'vendor_id' =>  $user->id, 
                'payment_name' =>  'RazorPay',
                'currency' =>  'INR',
                'image' =>  'razorpay.png',
                'environment' =>  1,
                'is_available' =>  2,
                'is_activate' =>  1,
            ]);
}
            $easy_cash = Payment::where('payment_name','EasyCash')
            ->where('vendor_id',$user->id)->first();
            if (!$easy_cash) {
                Payment::create([
                    'vendor_id' =>  $user->id, 
                    'payment_name' =>  'EasyCash',
                    'image' =>  'easy_cash1.jpg',
                    'environment' =>  1,
                    'is_available' =>  2,
                    'is_activate' =>  1,
                ]);
            }

            
        }
        
    }
}
