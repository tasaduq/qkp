<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;


class HomeController extends Controller
{
    public function index(Request $request){

        $featured_products = Products::where([
            "featured" => 1,
            "active" => 1
        ])->take(10)->get();

        $productsc = Products::select('color')->distinct()->get();

        $categories = Categories::where([
            "is_active" => 1,
        ])->get();
        
        return view('index')->with("featured_products", $featured_products)->with('productcolor',$productsc)->with('categories',$categories);
    }
    public function products(Request $request){
        $cat = $request->get("c");
        $category = Categories::where("category_id", $cat)->first();
        $products = Products::where([
            "category" => $cat,
            "active" => 1
        ])->take(9)->get();

        return view('products')->with("products", $products)->with("category", $category);
    }
    public function product_detail($id, Request $request){
        $product = Products::where([
            "product_id" => $id,
            "active" => 1,
        ])->first();
       
        return view('product-details')->with("product", $product);
    }
    public function mandi(Request $request){
        $categories = Categories::where([
            "is_active" => 1,
        ])->get();
        return view('mandi')->with('categories', $categories);
    }
    
}
