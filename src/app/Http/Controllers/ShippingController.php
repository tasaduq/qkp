<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;
use DB;
use Response;


class ShippingController extends Controller
{
    public function view(Request $request){

        //cateogires
        $categories = Categories::get()->keyBy('category_id');
        $cities = DB::table('shipping_cities')->get()->keyBy('id');
        $shipping = DB::table('shipping_cost')->get();
        // dd($categories);
        return view('admin.shipping')->with('shipping',$shipping)->with('categories',$categories)->with('cities',$cities);
    }
    public function update(Request $request){
        $input = $request->except('_token');
        $cities = $request->get('city_id');
        $categories = $request->get('category_id');
        // dump($categories);
        // dd($cities);
        $shipping_id = $request->get('shipping_id');
        $cost = $request->get('cost');

        // dd($shipping_id);
        $data_to_update = [];
        $data_to_insert = [];   

        if( count($shipping_id) == count($cost) ){
            for ($count=0; $count < count($cost) ; $count++) { 
                // dump($shipping_id[$count]." == ".$cost[$count]);
                $key = $shipping_id[$count];
                $value = $cost[$count];
                
               
                
                

                if($shipping_id[$count] != 0){
                    $update = DB::table('shipping_cost')->where('id',$key)->update(['cost'=>$value]);
                    // $data_to_update[$key] = $value; 
                }
                else{
                    array_push($data_to_insert, array(
                        "city_id" => $cities[$count],
                        "category_id" => $categories[$count],
                        "cost" => $cost[$count]
                    ));
                }
            }
            // dd($data_to_insert);
            $insert = DB::table('shipping_cost')->where('id',$key)->insert($data_to_insert);

            
        }
        // dd($update.$insert);
        // $update && $insert
        if(1){
            $response['result'] = 'true';
            $response['code'] = 200;
        }
        else {
            $response['result'] = 'false';
            $response['code'] = 100;
            $response['error'] = 'Unable to update at this time';
        }
        return Response::json($response);
    }
}
