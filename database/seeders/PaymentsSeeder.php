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
            $razor_pay = Payment::where('payment_name','Stripe')
            ->where('vendor_id',$user->id)->first();
            if (!$razor_pay) {
                Payment::create([
                    'vendor_id' =>  $user->id, 
                    'payment_name' =>  'Stripe',
                    'currency' =>  'USD',
                    'image' =>  'stripe.png',
                    'environment' =>  1,
                    'is_available' =>  2,
                    'is_activate' =>  1,
                ]);
            }
            $razor_pay = Payment::where('payment_name','Flutterwave')
            ->where('vendor_id',$user->id)->first();
            if (!$razor_pay) {
                Payment::create([
                    'vendor_id' =>  $user->id, 
                    'payment_name' =>  'Stripe',
                    'currency' =>  'NGN',
                    'image' =>  'flutterwave.png',
                    'environment' =>  1,
                    'is_available' =>  2,
                    'is_activate' =>  1,
                ]);
            }
            $razor_pay = Payment::where('payment_name','Paystack')
            ->where('vendor_id',$user->id)->first();
            if (!$razor_pay) {
                Payment::create([
                    'vendor_id' =>  $user->id, 
                    'payment_name' =>  'Paystack',
                    'currency' =>  'GHS',
                    'image' =>  'paystack.png',
                    'environment' =>  1,
                    'is_available' =>  2,
                    'is_activate' =>  1,
                ]);
            }
            $razor_pay = Payment::where('payment_name','Banktransfer')
            ->where('vendor_id',$user->id)->first();
            if (!$razor_pay) {
                Payment::create([
                    'vendor_id' =>  $user->id, 
                    'payment_name' =>  'Banktransfer',
                    'currency' =>  '',
                    'image' =>  'banktransfer.png',
                    'environment' =>  1,
                    'is_available' =>  2,
                    'is_activate' =>  1,
                ]);
            }
            $razor_pay = Payment::where('payment_name','Mercadopago')
            ->where('vendor_id',$user->id)->first();
            if (!$razor_pay) {
                Payment::create([
                    'vendor_id' =>  $user->id, 
                    'payment_name' =>  'Mercadopago',
                    'currency' =>  'R$',
                    'image' =>  'mercadopago.png',
                    'environment' =>  1,
                    'is_available' =>  2,
                    'is_activate' =>  1,
                ]);
            }
            $razor_pay = Payment::where('payment_name','PayPal')
            ->where('vendor_id',$user->id)->first();
            if (!$razor_pay) {
                Payment::create([
                    'vendor_id' =>  $user->id, 
                    'payment_name' =>  'PayPal',
                    'currency' =>  'USD',
                    'image' =>  'paypal.png',
                    'environment' =>  1,
                    'is_available' =>  2,
                    'is_activate' =>  1,
                ]);
            }
            $razor_pay = Payment::where('payment_name','MyFatoorah')
            ->where('vendor_id',$user->id)->first();
            if (!$razor_pay) {
                Payment::create([
                    'vendor_id' =>  $user->id, 
                    'payment_name' =>  'MyFatoorah',
                    'currency' =>  'KWT',
                    'image' =>  'myfatoorah.png',
                    'environment' =>  1,
                    'is_available' =>  2,
                    'is_activate' =>  1,
                ]);
            }
            $razor_pay = Payment::where('payment_name','toyyibpay')
            ->where('vendor_id',$user->id)->first();
            if (!$razor_pay) {
                Payment::create([
                    'vendor_id' =>  $user->id, 
                    'payment_name' =>  'toyyibpay',
                    'currency' =>  'KWT',
                    'image' =>  'toyyibpay.png',
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
                    'currency' =>  'SAR',
                    'image' =>  'easycash.png',
                    'environment' =>  1,
                    'is_available' =>  2,
                    'is_activate' =>  1,
                ]);
            }

            
        }
        
    }
}
