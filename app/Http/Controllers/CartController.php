<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Response;
use Session;
use App\Models\User;
use App\Models\Products;
use App\Models\Orders;
use App\Models\OrderProducts;
use App\Models\OrderInstallments;
// use App\Models\Categories;
use DB;

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

        $user = Auth::user(); 
        if(!$user){
           return redirect('/cart');
        }


        $cart = $this->get_cart();
        $products_in_cart = array_keys($cart);

        $products = Products::where([
            "active" => 1
        ])->whereIn("product_id", $products_in_cart)->get();
        
        $shipping_fee = 5000;
        
        return view('checkout')->with("products",$products)->with("cart", $cart)->with("shipping_fee",$shipping_fee)->with("user",$user);
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
                "code" => 500,
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
        $response["cart_count"] = $this->get_cart_count();
        return Response::json($response);
    }
    public function shipping_cart_update(Request $request){
        $cart = $this->get_cart();
        $products_in_cart = array_keys($cart);

        $products = Products::where([
            "active" => 1
        ])->whereIn("product_id", $products_in_cart)->get();

        $shipping_fee = 5000;
        if( $request->get("shipping") == "2" ){
            $shipping_fee = 7000;
        }

        return view('sections.cart-right-section')->with("products",$products)->with("cart", $cart)->with("shipping_fee",$shipping_fee);//->with("user",$user);
    }
    public function remove_from_cart(Request $request){
        
        $request->validate([
            "productid" => "required|integer",
        ]);
        $productid = $request->get("productid");
        
        $response = array(
            "code" => 200,
            "message" => "Item removed from cart"
        );
        // dd($this->remove_item($productid));

        if( $this->remove_item($productid) ) {

        } else {
            $response = array(
                "code" => 200,
                "message" => "Failed to remove item from cart"
            );
        }
        return Response::json($response);
    }
    public function process_checkout(Request $request){
        

        $request->validate([
            "payment-method" => "required",
            "name" => "required",
            "city" => "required|integer",
            "address" => "required",
            "phone" => "required|numeric",
        ]);

        $input = $request->only("name", "city", "address", "phone");
        $paymentMethod = $request->get("payment-method");

        if( $paymentMethod == "bank-transfer" ){
            $paymentMethod = 1;
        }
        else {
            $paymentMethod = 0;
        }


        try {
        $entry =  DB::transaction(function() use ($input, $paymentMethod)  {

            $cart = $this->get_cart();
            
            $user = Auth::user();

            User::where("id", $user->id)->update($input);

            $order = array(
                "order_number" => rand(1111,9999),
                "user_id" => $user->id,
                "status" => 0,
                "payment_method" => $paymentMethod
            );
            $insertedOrderId = Orders::insertGetId($order);
            // dd($insertedOrderId);
            // $order_products = array();
            foreach ($cart as $key => $item) {
                // dump($item);

                $product = Products::find($item['product']);
                
                // TODO: Enable me
                if( $product->sold_out ){
                    continue;
                    // maybe throw exception, and then catch it.
                    // in cases when two people have added the same product to cart
                }

                // dump($product);

                $calculatedShipping = $product->calculated_city_shipping($input["city"]);

                $record = array(
                    "order_id" => $insertedOrderId,
                    "product_id" => $item['product'],
                    "no_of_installments" => $item['installment'], 
                    "shipping" => $calculatedShipping
                );

                $orderedProductId = OrderProducts::insertGetId($record);

                $res = $product->mark_sold();

                // dump($res);
                
                $OrderInstallments = array();

                for($i = $item['installment']; $i > 2 ; $i--) { 

                    $currentInstallmentPrice = $product->installment($item['installment']);

                    array_push($OrderInstallments, array(
                        "instalment_number" => $i,
                        "order_product_id" => $orderedProductId,
                        "status" => 0,
                        "amount" => $currentInstallmentPrice,
                    ));
                }
                
                OrderInstallments::insert($OrderInstallments);
               
            }
        });

        // return is_null($entry) ? true : $entry;
        
        $this->clear_cart();


        $result = array(
            "code"=> 200, 
            "result"=>"true", 
            // "url"=> $redirectTo 
        );


        } catch(Exception $e) {
            $result = array(
                "code"=> 500, 
                "result"=> "false", 
                "error"=> "Something is not right, please try again."
            );
        }
        

        return Response::json($result);

    }
    private function clear_cart(){
        return Session::forget("cart");   
    }
    private function get_cart(){
        return Session::has("cart") ? json_decode(Session::get("cart"), TRUE) : array();
    }
    private function update_cart($cart){
        Session::put("cart", json_encode($cart));
        return 1;
    }
    private function remove_item($item){
        
        $cart = $this->get_cart();

        unset($cart[$item]);

        if($this->update_cart($cart)){
            return 1;
        }
        return 0;
        
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
    public function get_cart_count(){
        $cart = $this->get_cart();
        return count($cart);
    }
    public function check_in_cart($productid){
        $cart = $this->get_cart();
        if( isset($cart[$productid]) ){
            return true;
        }
        return false;
    }
}
