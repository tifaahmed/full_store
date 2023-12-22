<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Variants extends Model
{
    use HasFactory , HasTranslations;
    protected $table = 'variants';
    protected $fillable = [
        'item_id',
        'name',
        'price',
        'original_price',
    ];
    public $translatable = ['name'];

}
