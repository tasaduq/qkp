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

        $data = array(
            'name'     =>    $request->name,
            'color'    =>    $request->color,
            'category' =>    $request->category,
            'current_weight'   =>    $request->current_weight,
            'weight'   =>    $request->weight,
            'price'    =>    $request->price,
            'description' => $request->description,
            'active' => $active,
            'featured' => $featured,
        );

        if($request->has("images")){
            $data["images"] = implode(",",$request->get("images"));
        }
        
        Products::where('product_id','=',$request->id)->update($data);
        

        return redirect()->route('products')->with('success','Product Update Successfully...');
    }


    public function get_products(Request $request){
        $paginate = config("site.pagination");
        $products = Products::latest()->paginate($paginate);
        
        $productName = '';
        if(trim($request->input('name')) != '') {
            $customerName = $request->input('name');
        }

        $dateFrom = '';
        if(trim($request->input('date_from')) != '') {
            $dateFrom = $request->input('date_from');
        }

        $dateTo = '';
        if(trim($request->input('date_to')) != '') {
            $dateTo = $request->input('date_to');
        }
        
        $selectedStatus = '';
        if($selectedStatus == $request->has('status')) {
            $selectedStatus = $request->input('status');
        }

        $products = Products::where(function ($query) use ($productName, $dateFrom, $dateTo, $selectedStatus) {
            
            if(trim($productName) != '')
            {
                $query->where('name', 'LIKE', "%{$productName}%");
            }
            if(trim($dateFrom) != '')
            {
                $query->whereDate('created_at', '>=', date('Y-m-d', strtotime($dateFrom)));
            }
            if(trim($dateTo) != '')
            {
                $query->whereDate('created_at', '<=', date('Y-m-d', strtotime($dateTo)));
            }
            if(is_numeric($selectedStatus))
            {
                $query->where('active', $selectedStatus);
            }
        })
        ->latest()->paginate($paginate);


        return view('admin.products', compact('productName', 'dateFrom', 'dateTo'))->with('products',$products)->with('');
        
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
