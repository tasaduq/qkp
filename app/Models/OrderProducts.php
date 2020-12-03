<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProducts extends Model
{
    use HasFactory;
    protected $table = "order_products";
    public function installments()
    {
        return $this->hasMany('App\Models\OrderInstallments', 'order_product_id');
    }
    public function product()
    {
        return $this->belongsTo('App\Models\Products', 'product_id', 'product_id');
    }
}
