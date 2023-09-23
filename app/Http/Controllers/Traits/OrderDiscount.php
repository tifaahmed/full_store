<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Http\JsonResponse ;
use Illuminate\Database\Eloquent\Builder;
use Auth;

// Models
    use App\Models\Cart;
    use App\Models\Coupons;

trait OrderDiscount {

    public function orderTrait_getOrderDiscount($promocode_id)   {
        
        $promocode      = $this->orderTrait_getPromocode($promocode_id);
        $carts          = $this->orderTrait_getCartItems($promocode['items']->pluck('id'));
       
        $itemsPrices    = $this->orderTrait_calculateCartItemsPrices($carts);
        return $this->orderTrait_calculateDiscount($promocode->price,$itemsPrices);

    }


    // models of the order 

        // @param  array or null    $items_ids 
        // @return carts data
            public function orderTrait_getCartItems($items_ids = null) {
                return Cart::MySession()->items($items_ids)->get();
            }
        // @param  int    $promocode_id 
        // @return Coupons data  
            public function orderTrait_getPromocode($promocode_id = null) {
                return Coupons::where('id',$promocode_id)->with('items')->first();
            }

    // models of the order 

    //  cart calculations

        // @param  array of objects or null    $items_ids 
        // @return  summ of the prices 
            public function orderTrait_calculateCartItemsPrices($carts)   {
                return (new Cart)->cartSumOnlyPrices($carts);
            }

        // @param  array of objects or null    $items_ids 
        // @return  summ of the prices 
            public function orderTrait_calculateDiscount($percentage,$total)   {
                return   $total * ($percentage/100)   ;
            }
    // cart calculations
  
    
}