<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Branch extends Model
{
    use HasFactory ,HasTranslations;
    protected $table = 'branches';
    protected $fillable=[
        'vendor_id',
        'name',
        'deliveryarea_id',
        'is_active',
    ]; 
    public $translatable = ['name'];

    public function vendor(){
        return $this->belongsTo(User::class, 'vendor_id');
    }

    public function deliveryArea(){
        return $this->belongsTo(DeliveryArea::class, 'deliveryarea_id');
    }
}