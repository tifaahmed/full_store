<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryArea extends Model
{
    use HasFactory;
    protected $table = 'deliveryareas';
    protected $fillable=[
        'vendor_id',
        'name',
        'price',
        'delivery_time',
        'coordinates'
    ];

    
}
