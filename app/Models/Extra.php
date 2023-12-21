<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Extra extends Model
{
    use HasFactory,HasTranslations;
    protected $table = 'extras';
    protected $fillable=[
        'item_id',
        'name',
        'price'
    ];
    public $translatable = ['name'];

}
