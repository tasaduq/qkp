<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;
use Response;
use App\Http\Controllers\EMAILER;
use App\Http\Controllers\INVOICER;
use Auth;

use App\Models\Orders;
class HomeController extends Controller
{

    public function emailtest(Request $request, $orderid = 25, $status = 2){
        
        $user = Auth::user();
        $order = Orders::find($orderid);
        echo $email = EMAILER::send("ORDER", $status, $order, $user, true);

        // dd($email);
        exit(0);
        /////////////////////////////////////////////////////

    }
    public function index(Request $request){

        $featured_products = Products::where([
            "featured" => 1,
            "active" => 1
        ])->take(10)->get();

        $productsc = Products::select('color')->where("color", "<>", "Null")->distinct()->get();

        $categories = Categories::where([
            "is_active" => 1,
        ])->get();
        
        return view('index')->with("featured_products", $featured_products)->with('productcolor',$productsc)->with('categories',$categories);
    }
    public function products_filter(Request $request){
        

        $productsc = Products::select('color')->where("color", "<>", "Null")->distinct()->get();
        
        $where = [
            "active" => 1
        ];
        
        if( $request->has("c") ){
            $where["category"] = $request->get("c");
            $cat = $request->get("c");
        }
        else {
            $cat = Categories::first()->category_id;
        }


        if( $request->has("co") && $request->get("co") != "0" ){
            $where['color'] = $request->get("co");
        }
       
        $category = Categories::where("category_id", $cat)->first();

        
        $products = Products::where($where);

        if( $request->has("w") && $request->get("w") != "0" ){
            $weights = explode('-',$request->get("w"));
            $products = $products->whereBetween('weight', $weights);

        }
        
        if( $request->has("p") ){
            $weights = explode('-',$request->get("p"));
            $weights[0] = $weights[0]*1000;
            $weights[1] = $weights[1]*1000;
            // dump($weights);
            $products = $products->whereBetween('price', $weights);

        }
        
        $products = $products->orderBy('sold_out')->orderBy('created_at');
       
        $products = $products->paginate(9);
        $products->withPath('/products');
        $stock = $products->where('sold_out',0)->count();
        // dd($products);

        $categories = Categories::where([
            "is_active" => 1,
        ])->get();
        

        return view('products-filter')->with("products", $products)
                                ->with("category", $category)
                                ->with('productcolor',$productsc)
                                ->with('categories',$categories)
                                ->with("stock",$stock);
    }
    public function products(Request $request){

        

        $productsc = Products::select('color')->where("color", "<>", "Null")->distinct()->get();
        
        $where = [
            "active" => 1
        ];
        
        if( $request->has("c") ){
            $where["category"] = $request->get("c");
            $cat = $request->get("c");
        }
        else {
            $cat = Categories::first()->category_id;
        }


        if( $request->has("co") && $request->get("co") != "0" ){
            $where['color'] = $request->get("co");
        }
       
        $category = Categories::where("category_id", $cat)->first();

        
        $products = Products::where($where);
        // $paginate = config("site.fron_pagination");
        // ->latest();

        if( $request->has("w") && $request->get("w") != "0" ){
            $weights = explode('-',$request->get("w"));
            $products = $products->whereBetween('weight', $weights);

        }
        
        if( $request->has("p") ){
            $weights = explode('-',$request->get("p"));
            $weights[0] = $weights[0]*1000;
            $weights[1] = $weights[1]*1000;
            // dump($weights);
            $products = $products->whereBetween('price', $weights);

        }
        
        $products = $products->orderBy('sold_out')->orderBy('created_at');
        $products = $products->paginate(9);
        $products->withPath('/products');   

        $stock = $products->where('sold_out',0)->count();
        // dd($products);

        $categories = Categories::where([
            "is_active" => 1,
        ])->get();
        

        return view('products')->with("products", $products)
                                ->with("category", $category)
                                ->with('productcolor',$productsc)
                                ->with('categories',$categories)
                                ->with("stock",$stock);
    }
    public function filter_params(Request $request){

        $where = array();
        if( $request->has("c") ){
            $where["category"] = $request->get("c");

            $product['c'] = Products::select('color')->where($where)->where("color", "<>", "Null")->distinct()->get();
            $product['weight_min'] = Products::where($where)->min('weight');
            $product['weight_max'] = Products::where($where)->max('weight');
            $product['price_min'] = Products::where($where)->min('price');
            $product['price_max'] = Products::where($where)->max('price');
            $product['code'] = 200;
            return Response::json($product);

        }
        else {
            //cateory is reuqired
        }
        
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
    public function view_invoice($invoice, Request $request){
        return response()->file(
            storage_path('app\invoices\\'.$invoice)
        );
        // return PDF::loadHTML('<h1>Test</h1>')->save('/path-to/my_stored_file.pdf')->stream('download.pdf');
    }
        
}
