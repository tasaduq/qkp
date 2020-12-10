<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Rules\Password;
use App\Models\Products;
use App\Models\Categories;
use Illuminate\Support\Facades\Hash;
use Response;
use DB;
use Validator;


class ProductsController extends Controller
{
    public function add_product(Request $request){

        $data = $request->except(["_token", "images"]);

        if($request->has("images")){
            $data["images"] = implode(",",$request->get("images"));
        }
        
        if($request->has("active")){
            if($request->get("active") == "on");
            {
                $data["active"] = 1;
            }
        }
        if($request->has("featured")){
            if($request->get("featured") == "on");
            {
                $data["featured"] = 1;
            }
        }
        

        Products::insert($data);

        $result = array("result"=>"true");

        return Response::json($result);
        
    } 

    
    public function edit($id)
    {
       // get categories
       $acategory= Categories::all('category_id', 'category_name');
        
       $aProduct = Products::where('product_id','=',$id)
        ->first();
       return view('admin.edit_product', compact('aProduct','acategory'));
    }

    public function update(Request $request)
    {   
        // $data = $request->except(["_token"]);

        if($request->has("active")){

            $active = $request->active = 1;
        }
        else{
            $active = $request->active = 0;
        }

        if($request->has("featured")){

            $featured = $request->featured = 1;
        }
        else{
            $featured = $request->featured = 0;
        }

        
            Products::where('product_id','=',$request->id)->update([
                    'name'     =>    $request->name,
                    'color'    =>    $request->color,
                    'category' =>    $request->category,
                    'weight'   =>    $request->weight,
                    'price'    =>    $request->price,
                    'description' => $request->description,
                    'active' => $active,
                    'featured' => $featured,
                ]);
        

        return redirect()->route('products')->with('success','Product Update Successfully...');
    }


    public function get_products(Request $request){
        $products = Products::all();
        return view('admin.products')->with('products',$products);
        
    }
    public function add_product_view(Request $request){
        
        $categories = Categories::all();
        return view('admin.add_product')->with("categories",$categories);
        
        
    }

    public function clone($id){
        $product = Products::find($id);
        $new = $product->replicate();
        $new->save();
        return redirect()->route('products')->with('success','Product Cloned Successfully...');
        
    }

    public function destroy($id)
    {  
        $product = Products::find($id);
        $product->delete();
        return redirect()->route('products')->with('success','Product Deleted Successfully...');
    }

    public function productssearch(Request $request){
        
        $category = $request->category;
        $weight  = $request->weight;
        $product_color = $request->product_color;

        
    }
    
}
