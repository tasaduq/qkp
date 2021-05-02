<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\CartController;
use SETTINGS;
use Session;
use DB;

class Products extends Model
{
    use HasFactory;
    //use SoftDeletes;
    protected $table = 'products';
    protected $fillable = ['name', 'color','category','weight','price','description','active', 'featured','sold_out'];
    protected $primaryKey = 'product_id';
    // protected $cacheFor = 600; 
    
    public function installment($installment)
    {
        $advance = $this->regular_advance();
        if( $installment == "1" ){
            $advance = $this->final_advance();
        }
        return ($this->price - ceil( $this->price * $advance ) ) / $installment;
    }
    public function regular_advance()
    {
        return SETTINGS::calculate('regular_advance');
    }
    public function final_advance()
    {
        return SETTINGS::calculate('final_advance');
    }
    public function installment_formatted($i)
    {
        return number_format( $this->installment($i) );
    }
    
    public function lowest_installment()
    {
        $get_feasible_installments = Session::get("get_feasible_installments");
        return number_format( ( $this->price - $this->advance($get_feasible_installments) )/$get_feasible_installments);
    }
    public function price_formatted()
    {
        return number_format( $this->price );
    }
    public function advance(int $installment = 2)
    {
        $advance = $this->regular_advance();
        if( $installment == 1 ){
            $advance = $this->final_advance();
        }
        return ceil( $this->price * $advance );
    }
    public function least_installment(){
        $currentIsntalment = Session::get("get_feasible_installments");
        return ( $this->price - $this->advance( $currentIsntalment ) ) / $currentIsntalment;
    }
    public function advance_formatted(int $installment = 2)
    {
        return number_format( $this->advance($installment) );
    }
    public function calculated_city_shipping($cityId)
    {
        // dd(debug_backtrace());

        // goto shipping cost table
        // fetch against city id $cityId + product cat id $this->category
    //    dump("cityId".$cityId);
    //    dump("cat".$this->category);
        $shipping = DB::table('shipping_cost')->where('city_id', $cityId)->where('category_id', $this->category)->first();
        // dd($shipping);
        if($shipping !== null){
            $shipping = $shipping->cost;    
        }
        else{
            //TODO: Add default shipping to settings
            
            $shipping = 5000;
        }
        
        
        // $shipping = 5000;
        // if( $cityId == "2" ){
        //     $shipping = 7000;
        // }

        return $shipping;
    }
    public function calculated_city_shipping_formatted(int $cityId = 2)
    {
        return number_format( $this->calculated_city_shipping($cityId) );
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

    public function getRelated(){
        // dd(Self::isActive()->where("category",$this->category));
        return Self::isActive()->where("category",$this->category)
        ->where('product_id','!=',$this->product_id)
        ->take(10)->get();
    }
    public function isActive(){
        return Self::where("active",1);
        // $product = Products::where([
        //     "product_id" => $id,
        //     "active" => 1,
        // ])->first();
       
    }
}

