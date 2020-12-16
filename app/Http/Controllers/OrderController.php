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


class OrderController extends Controller
{
    public function cancel_order_animal(Request $request){
        
        $this->validate($request, array(
            'orderanimalno' => 'required|integer',
        ));
        
        $response = array(
            "code" => 200,
            "message" => ""
        );

           
        $productOrderId = $request->get("orderanimalno");
        $user = Auth::user();
        $user_id = $user->id;
        
        $orderProduct = OrderProducts::where([
            "id" => $productOrderId,
            // "user_id" => $user_id
        ])->first();

        
        if( ! $orderProduct->is_user($user_id) ){
            $response = array(
                "code" => 404,
                "message" => "Something is not right, please refresh and retry.."
            );
            return Response::json($response);

        }
        
        // dd($orderProduct);
        $response = array(
            "code" => 201,
            "message" => "Coudn't cancel, please try again."
        );


        if( $orderProduct->is_confirmed() ){
            //if payment is made, submit a cancellation request
            if($orderProduct->request_cancel()){
                $response["code"] = 200;
                $response["message"] = "Request for cancellation has been submitted";
            }

        }
        else {
            //check if payment has been made
            //if no payment is made, cancel this order
            //make the animal available in the market again

            // If this is the only animal, also cancel the order.
            // if the order is confirmed and this is the only animal, then dont immediately cancel
            // TODO: this should never happened, because on order confirmation, the animal is also to be marked as confirmed.


            if($orderProduct->immediate_cancel()){
                if($orderProduct->restock()){

                    
                    $response["code"] = 200;
                    $response["message"] = "Animal has been cancelled successfully";
                }
            }
        }
        
        return Response::json($response);
    }

    public function cancel_order(Request $request){
        
        $this->validate($request, array(
            'orderno' => 'required|integer',
        ));
        
        $order_number = $request->get("orderno");
        $user = Auth::user();
        $user_id = $user->id;
        
        $order = Orders::where([
            "order_number" => $order_number,
            "user_id" => $user_id
        ])->first();
        
        
        $response = array(
            "code" => 201,
            "message" => "Coudn't cancel, please try again."
        );


        if( $order->is_confirmed() ){
            //if payment is made, submit a cancellation request
            if($order->request_cancel()){
                $response["code"] = 200;
                $response["message"] = "Request for cancellation has been submitted";
            }

        }
        else {
            //check if payment has been made
            //if no payment is made, cancel this order
            //make the animal available in the market again
            if($order->immediate_cancel()){
                if($order->restock()){
                    $response["code"] = 200;
                    $response["message"] = "Order has been cancelled successfully";
                }
            }
        }
        
        return Response::json($response);

    }
    
    public function payment($order_no = null, Request $request){
        // session::put("order_id", 81 );

        $user = Auth::user();
        $user_id = $user->id;
        

        if( $order_no != null){
            $where = ["order_number"=>$order_no, "user_id"=>$user_id];
        }
        else {
            
            $order_id = session::get("order_id");
            $where = ["id"=>$order_id, "user_id"=>$user_id];
        }   
        
        $order = Orders::where($where)->first();

        session::put("order_id",$order->id);

        return view('payment')->with("order", $order)->with("user", $user);
    }
    public function upload_receipt(Request $request){

        $this->validate($request, array(
            'receipt' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ));
        //TODO: get me from somewhere else
        $order_id = session::get("order_id");
        // dump($order_id);
        $user = Auth::user();
        $user_id = $user->id;
        
        $order = Orders::where(["id"=>$order_id, "user_id"=>$user_id])->first();

        $response = array(
            "code" => 100,
            "message" => "Something went wrong, please try again"
        );

        //save the data to the database
        if($request->hasFile('receipt')){
            
            $receiptFile = $request->file('receipt');
            $receiptMime = $receiptFile->getMimeType();
            $receiptFile = file_get_contents($receiptFile);
            $base64_receipt = base64_encode($receiptFile);

            $receipt = 'data: '.$receiptMime.';base64,'.$base64_receipt;
            // dd($receipt);
            // echo "<img src=\"$receipt\" alt=\"\" />";


            $order->receipt = $receipt;
            if($order->save()){
                $response = array(
                    "code" => 200,
                    "message" => "Receipt saved"
                );
            }
        }
        return Response::json($response);
    }
}


