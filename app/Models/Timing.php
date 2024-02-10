<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timing extends Model
{
    use HasFactory;
    protected $table = 'timings';
    protected $fillable = [
        'vendor_id',
        'day',
        'open_time',
        'break_start',
        'break_end',
        'close_time',
        'is_always_close',
    ];
    public function vendor(){
        return $this->belongsTo(User::class, 'vendor_id');
    }
}
