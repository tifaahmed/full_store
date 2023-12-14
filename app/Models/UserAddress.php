<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\helper;

// Scopes
use App\Scopes\ScopeAuthUser; // auth_user AuthUser
// Enums
use App\Enums\AddressTypeEnums; 
class UserAddress extends Model
{
    use HasFactory , ScopeAuthUser;
    protected $table = 'user_addresses';

    protected $fillable = [
        'is_active',
        'user_id',
        'vendor_id',
        'title',
        'type',

        'address',
        'house_num',
        'street',
        'block',
        'pincode',
        'building',
        'landmark',
        // 'delivery_area',
        'latitude',
        'longitude',
        'user_ip',
        'delivery_area_id'
    ];
    // relations
        public function user(){
            return $this->hasOne(User::class, 'id', 'user_id');
        }
    // get Attribute 
        public function getCreatedAtDateFormatAttribute() { // created_at_date_format CreatedAtDateFormat 
            return helper::date_format($this->created_at);
        }
        public function getTypeNameAttribute() {   //type_name TypeName
            return AddressTypeEnums::getConstantByName($this->payment_type);            
        }
}





