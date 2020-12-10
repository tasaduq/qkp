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
        $response = array(
            "code" => 200,
            "message" => ""
        );

        //check if payment has been made
        //if no payment is made, cancel this order
        //make the animal available in the market again
        //if payment is made, submit a cancellation request


        return Response::json($response);

    }
    public function payment(){
        // session::put("order_id", 81 );
        
        $order_id = session::get("order_id");
        
        $user = Auth::user();
        $user_id = $user->id;
        
        $order = Orders::where(["id"=>$order_id, "user_id"=>$user_id])->first();

        // session::flash("order_id",$order_id);

        return view('payment')->with("order", $order)->with("user", $user);
    }
    public function upload_receipt(Request $request){

        $this->validate($request, array(
            'receipt' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ));

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


