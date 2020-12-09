<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\CartController;
use Session;

class Products extends Model
{
    use HasFactory;
    //use SoftDeletes;
    protected $table = 'products';
    protected $fillable = ['name', 'color','category','weight','price','description','active', 'featured','sold_out'];
    protected $primaryKey = 'product_id';
    protected $cacheFor = 600; 
    
    public function installment($installment)
    {
        $advance = 0.3;
        if( $installment == "1" ){
            $advance = 0.5;
        }
        return ($this->price - ceil( $this->price * $advance ) ) / $installment;
    }
    public function installment_formatted($i)
    {
        return number_format( $this->installment($i) );
    }
    
    public function lowest_installment()
    {
        return number_format( ( $this->price - ceil($this->price*0.3) )/Session::get("get_feasible_installments"));
    }
    public function price_formatted()
    {
        return number_format( $this->price );
    }
    public function advance(int $installment = 2)
    {
        $advance = 0.3;
        if( $installment == 1 ){
            $advance = 0.5;
        }
        return ceil( $this->price * $advance );
    }
    public function advance_formatted(int $installment = 2)
    {
        return number_format( $this->advance($installment) );
    }
    public function calculated_city_shipping($cityId)
    {
        $shipping = 5000;
        if( $cityId == "2" ){
            $shipping = 7000;
        }
        return $shipping;
    }
    public function check_in_cart(){
        $cart = new CartController();
        return $cart->check_in_cart($this->product_id);
    }
    public function mark_sold(){
        $this->sold_out = 1;
        $this->save();
        // dd(Self::find($this->product_id)->update(["sold_out","1"]));
        // return 1;
    }
    public function images(){

        $imageid = array();
        if ( strpos($this->images, ",") > -1){
              $imageid = explode(",",$this->images);  
        }
        else {
           $imageid[0] = $this->images;
        }
        
        $images = \App\Models\Media::whereIn("id", $imageid)->get();
                     
        return $images = $images ? $images : array();
    }
    
    // public function installment()
    // {
    //     return number_format( $this->advance() );
    // }
    // public function installment_formatted()
    // {
    //     return number_format( $this->advance() );
    // }
}
