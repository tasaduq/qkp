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
}


