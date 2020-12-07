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
    public function process_checkout(Request $request){
        

        $request->validate([
            "name" => "required|alpha",
            "city" => "required|integer",
            "address" => "required",
            "phone" => "required|numeric",
        ]);

        $input = $request->only("name", "city", "address", "phone" );
        // dd($request->all());


        try {
        $entry =  DB::transaction(function() use ($input)  {

            $cart = $this->get_cart();
            
            $user = Auth::user();

            User::where("id", $user->id)->update($input);

            $order = array(
                "order_number" => rand(1111,9999),
                "user_id" => $user->id,
                "status" => 0,
            );
    
            $insertedOrderId = Orders::insertGetId($order);
            // dd($insertedOrderId);
            // $order_products = array();
            foreach ($cart as $key => $item) {
                // dump($item);

                $product = Products::find($item['product']);
                
                // dump($product);

                $calculatedShipping = $product->calculated_city_shipping($input["city"]);

                $record = array(
                    "order_id" => $insertedOrderId,
                    "product_id" => $item['product'],
                    "no_of_installments" => $item['installment'], 
                    "shipping" => $calculatedShipping
                );

                $orderedProductId = OrderProducts::insertGetId($record);

                $OrderInstallments = array();

                for($i = $item['installment']; $i > 2 ; $i--) { 

                    $currentInstallmentPrice = $product->installment($i);

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
