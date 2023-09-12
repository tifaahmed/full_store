<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableQR extends Model
{
    use HasFactory;

    protected $table = "tableqr";

    public function area()
    {
        return $this->hasOne('App\Models\Area', 'id', 'area_id');
    }
}
