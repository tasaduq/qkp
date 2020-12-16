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
    public function order()
    {
        return $this->belongsTo('App\Models\Orders', 'order_id', 'id');
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
    public function is_confirmed(){
        return $this->status == "2";
    }
    public function cancellable()
    {
        // return ($this->status != "7" && $this->status != "5" && $this->status != "5");
        return $this->payable();
    }
    public function payable()
    {
        return ($this->status == "2" || $this->status == "1");
        // return ($this->status != "2" && $this->status != "7" && $this->status != "5");
    }
    public function in_process(){
        return $this->cancellable();
    }
    public function request_cancel(){
        $this->status = "7";
        return $this->save();
    }
    public function immediate_cancel(){
        $this->status = "5";
        return $this->save();
    }
    public function is_user($user_id){
        return $this->order->user_id == $user_id;
    }
    public function restock(){
        //get list of all products
        // $orderproduct = OrderProducts::find($this->product_id)->first();
        
        //mark all products unsold
        return Products::where("product_id", $this->product_id)->update(["sold_out" => 0]);

    }
}
