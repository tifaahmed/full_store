<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasFactory,HasTranslations;
    protected $table = 'categories';
    protected $fillable=[
        'vendor_id',
        'reorder_id',
        'name'
    ];
    public $translatable = ['name'];

    // hasMany
        public function items(){
            return $this->hasMany(Item::class,'cat_id');
        }
}
