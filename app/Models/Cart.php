<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\ScopeMySession; // my_session / MySession
use App\Scopes\ScopeItems; // items / Items

class Cart extends Model
{
    use HasFactory , ScopeMySession ,ScopeItems ;
    protected $table = 'carts';
    protected $fillable=[
        'session_id',
        'item_id',
        'price',
        'qty'
    ];

    // func    
        public function cartSumOnlyPrices($model){
            $total = 0;
            foreach ($model as $key => $value) {
                $total += $value->price * $value->qty;
            }
            return  $total;
        }  
}
