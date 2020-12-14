<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

// use App\Models\Products;
use App\Models\Orders;
use App\Models\OrderProducts;
use App\Models\OrderInstallments;

class UserController extends Controller
{
    
    public function profile(Request $request){

        $user = Auth::user();
        $orders = Orders::where("user_id", $user->id)->orderBy('created_at', 'desc')->get();
        // dd($orders);
        return view('profile')->with("orders", $orders);
    }
}
