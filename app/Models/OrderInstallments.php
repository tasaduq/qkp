<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderInstallments extends Model
{
    use HasFactory;
    protected $table = "order_installments";

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
    public function payable(){
        return $this->status == "7" ||  $this->status == "8";
    }
    
}
