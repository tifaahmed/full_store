<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\ScopeAuthVendor; // auth_vendor

class Item extends Model
{
    use HasFactory , ScopeAuthVendor;

    protected $table = 'items';
    protected $fillable=[
        'vendor_id',
        'reorder_id',
        'cat_id',

        'item_name',
        'description',
        'item_price',
        'item_original_price',
        'image',
        'tax',
        'slug',
        'is_available',
        'has_variants',
    ];
    public $append = [
        'title',
    ];

    // Accessors
        public function getTitleAttribute() {  // title Title
            $category_name =  $this->category_info ? $this->category_info->name : null;
            return $category_name .' / '. $this->item_name;
        }
    // hasMany
        public function extras(){
            return $this->hasMany('App\Models\Extra', 'item_id', 'id')->select('id', 'name', 'price', 'item_id');
        }
        public function variation(){
            return $this->hasMany('App\Models\Variants','item_id','id')->select('id','item_id','name','price','original_price');
        }
    // hasOne
        public function category_info(){
            return $this->hasOne('App\Models\Category', 'id', 'cat_id');
        }
        public function item_image(){
            return $this->hasOne('App\Models\ItemImages','item_id','id')->select('item_images.id','item_images.image AS image_name','item_images.item_id',\DB::raw("CONCAT('".url(env('ASSETSPATHURL').'item/')."/', item_images.image) AS image_url"));
        }
    // belongsToMany    
        public function coupons(){
            return $this->belongsToMany(Coupons::class, CouponItem::class, 'item_id', 'coupon_id')
            ->using(CouponItem::class);
        }  
}