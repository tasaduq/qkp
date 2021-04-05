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
use App\Http\Controllers\EMAILER;
use SETTINGS;
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
        
        //$shipping_fee = 5000;
        $shipping_city = 1;
        //TODO: Add default city to settings
        return view('cart')->with("products",$products)->with("cart", $cart)->with("shipping_city",$shipping_city);
    }
    public function checkout(){

        $user = Auth::user(); 
        if(!$user){
           return redirect('/cart');
        }


        $cart = $this->get_cart();
        if( empty($cart) ){
            
        }
        $products_in_cart = array_keys($cart);

        $products = Products::where([
            "active" => 1
        ])->whereIn("product_id", $products_in_cart)->get();
        
        //$shipping_fee = 5000;
        $shipping_city = 1;
        //TODO: Add default city to settings
        // dd($shipping_city);
        return view('checkout')->with("products",$products)->with("cart", $cart)->with("user",$user)->with("shipping_city",$shipping_city);//->with("shipping_fee",$shipping_fee);
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

        $shipping_city = $request->get("shipping");

        // $shipping_fee = 5000;
        // if( $request->get("shipping") == "2" ){ // get city
        //     $shipping_fee = 7000;
        // }

        // goto shipping cost table
        // fetch all against city id
        // 
        

        return view('sections.cart-right-section')->with("products",$products)->with("cart", $cart)->with("shipping_city",$shipping_city);//->with("user",$user);
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

        
        if(empty($this->get_cart())){
            $result = array(
                "code"=> 500, 
                "result"=> "false", 
                "error"=> "Your cart seems to be empty."
            );
            return Response::json($result);
        }

        $input = $request->only("name", "city", "address", "phone");
        $paymentMethod = $request->get("payment-method");

        if( $paymentMethod == "bank-transfer" ){
            $paymentMethod = 1;
            $order_status = "10";
        }
        else if( $paymentMethod == "cash" ){
            $paymentMethod = 0;
            $order_status = "9";
        }

        $total_upfront_payment = 0;

        DB::beginTransaction();

        try {

        // $entry =  DB::transaction(function() use ($input, $paymentMethod)  {

            $cart = $this->get_cart();
            // dump($cart);
            $user = Auth::user();

            User::where("id", $user->id)->update($input);
            
            $order = array(
                "order_number" => rand(1111,9999),
                "user_id" => $user->id,
                "status" => $order_status,
                "payment_method" => $paymentMethod
            );
            
            $insertedOrderId = Orders::insertGetId($order);
            // dump($insertedOrderId);
            session::put("order_id",$insertedOrderId);
            
            // dd($insertedOrderId);
            // $order_products = array();
            foreach ($cart as $key => $item) {
                // dump($item);
                $installment = $item['installment'];
                $product = Products::find($item['product']);
                // dump($product);
                // TODO: Enable me
                if( $product->sold_out ){
                    // continue;
                    throw new \Exception($product->name." has been sold out");
                    
                    // maybe throw exception, and then catch it.
                    // in cases when two people have added the same product to cart
                }

                // dump($product);

                $calculatedShipping = $product->calculated_city_shipping($input["city"]);
                // dump($calculatedShipping);
                $total_upfront_payment += $calculatedShipping;
                // dump($total_upfront_payment);
                // dd("calculatedShipping");
                //create upfront insert with tax and shipping
                $advance = $product->advance($installment);

                $product_upfront_payment = $calculatedShipping+$advance;
                $product_then_price = $product->price;
                
                $record = array(
                    "order_id" => $insertedOrderId,
                    "product_id" => $item['product'],
                    "no_of_installments" => $installment, 
                    "product_then_price" => $product_then_price,
                    "product_upfront" => $product_upfront_payment,
                    "shipping" => $calculatedShipping
                );

                $orderedProductId = OrderProducts::insertGetId($record);

                $res = $product->mark_sold();

                // dump($res);
                
                $OrderInstallments = array();

                // dump($advance);
                $total_upfront_payment += $advance;
                // dump($total_upfront_payment);
                //TODO: I have made this 0 because the number of payments must not be totalling the product price right now
                for($i = $installment; $i > 0 ; $i--) { 

                    $currentInstallmentPrice = $product->installment($installment);
                    $currentInstallmentPrice = round($currentInstallmentPrice);
                    
                    if(SETTINGS::get("enable_tax")){
                        $currentInstallmentPriceWithTax = $currentInstallmentPrice+($currentInstallmentPrice*SETTINGS::calculate('tax_value'));
                        $currentInstallmentPriceWithTax = round($currentInstallmentPriceWithTax);
                    }
                    else {
                        $currentInstallmentPriceWithTax = $currentInstallmentPrice;
                    }
                    


                    $dueDate = date("Y-m-d H:i:s", strtotime( "+".$i." month", strtotime( date("Y-m-d H:i:s") ) ) );
                    // $dueDate = "DATE_ADD(CURRENT_DATE, INTERVAL ".$i." month )";
                    /* TODO: calculate due date in cases where due date is overlapping with eid date, adil said this wont happen
                    if($i == 1){
                        $eidDate = Session::get('eid_date');
                        $OneMonthLessThaneidDate = date("Y-m-d H:i:s", strtotime( "-1 month", strtotime( date($eidDate." 00:00:00") ) ) );
                        
                        $OneMonthLessThaneidDate    = new DateTime($OneMonthLessThaneidDate);

                        if ($dueDate > $OneMonthLessThaneidDate) {
                            echo 'greater than';
                        }else{
                            echo 'Less than';
                        }
                        
                    }
                    */

                    array_push($OrderInstallments, array(
                        "instalment_number" => $i,
                        "order_product_id" => $orderedProductId,
                        "status" => 1,
                        "amount" => $currentInstallmentPrice,
                        "after_tax_amount" => $currentInstallmentPriceWithTax,
                        "due_date" => $dueDate,
                    ));

                    // if($installment == $i){
                        // dump($currentInstallmentPrice);
                        // $total_upfront_payment +=  $currentInstallmentPrice;
                        // dump($total_upfront_payment);
                    // }

                }
                
                OrderInstallments::insert($OrderInstallments);
               
            }
        // });

        // return is_null($entry) ? true : $entry;
        // 
        

        if(\SETTINGS::get("enable_tax")){
            $total_tax = ceil($total_upfront_payment*SETTINGS::calculate('tax_value'));
            $total_upfront_payment += $total_tax;
            $total_upfront_payment = (int) ceil($total_upfront_payment);    
        }

        
        
        $this->clear_cart();
        // dd($total_upfront_payment);
        Orders::find($insertedOrderId)->update(["upfront"=>$total_upfront_payment]);
        // session::flash("order_first_payment",$total_upfront_payment);
        // dd(session::all());
        DB::commit();

        $data = array(
            "amount" => $total_upfront_payment,
            // "tax" => $installment->after_tax_amount - $installment->amount,
            // "after_tax_amount" => $installment->after_tax_amount,
            // "due_date" => $installment->due_date
        );
        $data = Orders::find($insertedOrderId);
        EMAILER::send("ORDER", $order_status, $data, $user, true);

        
        $result = array(
            "code"=> 200, 
            "result"=>"true", 
            "total_upfront_payment" => $total_upfront_payment
            // "url"=> $redirectTo 
        );

        } catch(\Exception $e) {
            DB::rollback();
            $result = array(
                "code"=> 501, 
                "result"=> "false", 
                "error"=> $e->getMessage(),
            );
        } catch(Exception $e) {
            DB::rollback();
            $result = array(
                "code"=> 500, 
                "result"=> "false", 
                "error"=> "Unable to process cart at this time, please try again later."
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
