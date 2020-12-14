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
    public function paid_amount()
    {
        return $this->product_upfront + $this->installments->where('status', '2')->sum('amount');   
    }
    public function remaining_amount()
    {
        return ($this->product_then_price + $this->shipping) - $this->paid_amount();   
    }
    public function installments_desc()
    {
        return $this->installments()->orderBy('id', 'desc')->get();
    }
}
