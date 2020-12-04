<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $cacheFor = 600;

    public function products()
    {
        return $this->hasMany('App\Models\OrderProducts', 'order_id');
    }
   
}
