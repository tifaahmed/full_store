<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;



class Areas extends Model
{
    use HasFactory;
    protected $table = 'area';
    public function city_info()
    {
        return $this->hasOne('App\Models\City','id','city_id');
    }
}

