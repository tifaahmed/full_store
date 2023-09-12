<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Model;



class Favorite extends Model

{

    protected $table='favorite';

    protected $fillable=['user_id','item_id'];


    public function variation(){
        return $this->hasMany('App\Models\Variation','item_id','id')->select('variation.id','variation.item_id','variation.variation','variation.product_price','variation.sale_price');
    }

}