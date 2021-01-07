<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Orders extends Model
{
    use HasFactory;
    protected $cacheFor = 600;
    protected $fillable = ['upfront'];
    

    public function user()
    {
        return $this->belongsTo("App\Models\User", "user_id", "id" );
    }
    public function products()
    {
        return $this->hasMany('App\Models\OrderProducts', 'order_id');
    }
    public function get_status()
    {
        return $this->hasOne("App\Models\OrderStatus", "id", "status" );
    }
    public function cancellable()
    {
        return ($this->status != "8" && $this->status != "5");
    }
    public function payable()
    {
        return ($this->status == "9" || $this->status == "10");
        // return ($this->status != "2" && $this->status != "7" && $this->status != "5");
    }
    public function in_process(){
        return $this->cancellable();
    }
    public function is_confirmed(){
        return $this->status == "2";
    }
    public function request_cancel($message){
        $this->cancellation_msg = $message;
        $this->status = "8";
        return $this->save();
    }
    public function immediate_cancel($message){
        $this->cancellation_msg = $message;
        $this->status = "5";
        return $this->save();
    }
    
    public function restock(){
        //get list of all products
        $orderproducts = OrderProducts::select(DB::raw("GROUP_CONCAT(product_id) AS 'products'"))->where("order_id",$this->id)->first();
        
        $products = array();
        if ( strpos($orderproducts->products, ",") > -1){
              $products = explode(",",$orderproducts->products);  
        }
        else {
           $products[0] = $orderproducts->products;
        }

        //mark all products unsold
        return Products::whereIn("product_id", $products)->update(["sold_out" => 0]);

    }
}
