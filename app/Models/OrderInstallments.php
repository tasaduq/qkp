<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderInstallments extends Model
{
    use HasFactory;
    protected $table = "order_installments";
    protected $fillable = ['status', 'invoice'];
    public function order_product()
    {
        return $this->belongsTo('App\Models\OrderProducts', 'order_product_id', 'id');
    }
    
    public function get_status()
    {
        return $this->hasOne("App\Models\OrderInstallmentsStatus", "id", "status" );
    }
    public function get_due_date(){
        if( $this->due_date != "" ){
            return explode(" ", $this->due_date)[0];
        }
        return "N/A";
    }
    public function due_date_month(){
        if( $this->due_date != "" ){
            return date("F", strtotime($this->due_date));
        }
        return "N/A";
        
    }
    public function is_user($user_id){
        return $this->order_product->is_user($user_id);
    }
    public function payable(){
        return $this->status == "7" ||  $this->status == "8";
    }
    
}
