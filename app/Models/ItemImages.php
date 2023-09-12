<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemImages extends Model
{
    protected $table='item_images';
    protected $fillable=['item_id','image'];
}
