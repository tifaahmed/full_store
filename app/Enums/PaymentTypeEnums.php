<?php 

namespace App\Enums;

use Spatie\Enum\Enum;
use ReflectionClass;

final class PaymentTypeEnums extends Enum
{

    public static function mapValueToName(): array
    {
        return [
            0 => 'online',
            1 => 'cod',
            2 => 'razorpay',
            3 => 'stripe',
            4 => 'flutterwave',
            5 => 'paystack',
            6 => '',
            7 => 'mercadopago',
            8 => 'paypal',
            9 => 'myfatoorah',
            10 => 'toyyibpay',
        ];
    }
    public static function mapNameToValue(): array
    {
        return [
            'online'        => 0,
            'cod'           => 1,
            'razorpay'      => 2,
            'stripe'        => 3,
            'flutterwave'   => 4,
            'paystack'      => 5,
            ''              => 6,
            'mercadopago'   => 7,
            'paypal'        => 8,
            'myfatoorah'    => 9,
            'toyyibpay'     => 10,
   
        ];
    }
    public static function getConstantByName($name)
    {
        $array = static::mapValueToName() ;
        if (  isset($array[$name]) ) {
            return  trans('labels.'.$array[$name]) ;  
        }
        return $name;
    }
    public static function getDefault(): string
    {
        $array =self::mapNameToValue();
        return $array['online'];
    }

}
