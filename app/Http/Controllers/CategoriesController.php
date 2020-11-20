<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Rules\Password;
use App\Models\Categories;
use Illuminate\Support\Facades\Hash;
use Response;
use Validator;


class CategoriesController extends Controller
{
    public function add_category(Request $request){

        $data = $request->except("_token");

        Products::insert($data);

        $result = array("result"=>"true");

        return Response::json($result);
        
    } 

    public function get_category(Request $request){
        $categories = Categories::all();

        return view('admin.categories')->with('categories',$categories);
        
    }
}
