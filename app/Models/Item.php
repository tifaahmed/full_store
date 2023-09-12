<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;



class Item extends Model

{

    use HasFactory;

    protected $table = 'items';



    public function extras()

    {

        return $this->hasMany('App\Models\Extra', 'item_id', 'id')->select('id', 'name', 'price', 'item_id');

    }

    public function variation(){
        return $this->hasMany('App\Models\Variants','item_id','id')->select('id','item_id','name','price','original_price');
    }

    public function category_info()

    {

        return $this->hasOne('App\Models\Category', 'id', 'cat_id');

    }

    public function item_image(){
        return $this->hasOne('App\Models\ItemImages','item_id','id')->select('item_images.id','item_images.image AS image_name','item_images.item_id',\DB::raw("CONCAT('".url(env('ASSETSPATHURL').'item/')."/', item_images.image) AS image_url"));
    }

}