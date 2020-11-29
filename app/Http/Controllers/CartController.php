<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Response;
use Session;
use App\Models\Products;
// use App\Models\Categories;


class CartController extends Controller
{
    //
    public function index(){
        $cart = $this->get_cart();
        $products_in_cart = array_keys($cart);

        $products = Products::where([
            "active" => 1
        ])->whereIn("product_id", $products_in_cart)->get();
        
        $shipping_fee = 5000;
        
        return view('cart')->with("products",$products)->with("cart", $cart)->with("shipping_fee",$shipping_fee);
    }
    public function checkout(){
        $cart = $this->get_cart();
        $products_in_cart = array_keys($cart);

        $products = Products::where([
            "active" => 1
        ])->whereIn("product_id", $products_in_cart)->get();
        
        $shipping_fee = 5000;
        
        return view('checkout')->with("products",$products)->with("cart", $cart)->with("shipping_fee",$shipping_fee);
    }
    public function add_to_cart(Request $request){
        
        
        $request->validate([
            'productid' => 'integer|exists:products,product_id',
            'installment' => 'integer'
        ]);

        $productid = $request->get("productid");
        $installment = $request->get("installment");

        $response = array(
            "code" => 200,
            "message" => "Item added to cart"
        );
        
        $item = array(
            "product" => $productid,
            "installment" => $installment 
        );
        // $this->clear_cart();

        //ensure product is active, and available
        if( $this->add_item($item) ) {

        } else {
            $response = array(
                "code" => 200,
                "message" => ""
            );
        }
        
        /*
        if(Auth::user()){ }
        else{
            $response = array(
                "code" => 100,
                "message" => "Please login first"
            );
        }
        */

        return Response::json($response);
    }
    private function clear_cart(){
        return Session::forget("cart");   
    }
    private function get_cart(){
        return Session::has("cart") ? json_decode(Session::get("cart"), TRUE) : array();
    }
    private function update_cart($cart){
        return Session::put("cart", json_encode($cart));
    }
    private function add_item($item){
        $cart = $this->get_cart();

        $cart[$item['product']] = $item;

        // if( array_push($cart, $item) ){
            if($this->update_cart($cart)){
                return 1;
            }
            return 0;
        // }
        // else {
            // return 0;
        // }
    }
}
