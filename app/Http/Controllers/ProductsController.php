<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Rules\Password;
use App\Models\Products;
use Illuminate\Support\Facades\Hash;
use Response;
use Validator;


class ProductsController extends Controller
{
    public function add_product(Request $request){

        $data = $request->except("_token");

        Products::insert($data);

        $result = array("result"=>"true");

        return Response::json($result);
        
    } 
    public function get_products(Request $request){
        $products = Products::all();

        // dd($products);
        // where("deleted",0)->
        return view('admin.products')->with('products',$products);
        
    }
}
