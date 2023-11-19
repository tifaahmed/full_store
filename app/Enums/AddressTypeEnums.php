<?php 

namespace App\Enums;

use Spatie\Enum\Enum;
use ReflectionClass;

final class AddressTypeEnums extends Enum
{

    public static function mapValueToName(): array
    {
        return [
            0 => [
                'name' =>'house',
                'icon' =>'fas fa-home',
            ],
            1 => [
                'name' =>'appartment',
                'icon' =>'fas fa-building',
            ], 
            2 => [
                'name' =>'office',
                'icon' =>'fas fa-briefcase',
            ], 
        ];
    }
    public static function mapNameToValue(): array
    {
        return [
            'house'        => 0,
            'appartment'   => 1,
            'office'       => 2,
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
        return $array['house'];
    }

}
