<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Categories extends Model
{
    use HasFactory;
    protected $cacheFor = 10000;

    public function totalCount()
    {
        return \App\Models\Products::where([
            "category" => $this->category_id,
            "active" => 1,
            // "sold" => 0,
        ])->count();
        
    }
    public function shipping($cityId){
        return $shipping = DB::table('shipping_cost')->where('city_id', $cityId)->where('category_id', $this->category_id)->first();   
    }

}
