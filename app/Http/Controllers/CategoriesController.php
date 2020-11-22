<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Rules\Password;
use App\Models\Categories;
use Illuminate\Support\Facades\Hash;
use DB;
use Response;
use Validator;


class CategoriesController extends Controller
{
     
        public function add_category(Request $request){

        $data = $request->except(["_token"]);
         
        if($request->has("is_active")){
            $data["is_active"] = 1;
        }
        else{
            $data["is_active"] = 0;
        }
        

        Categories::insert($data);

        $result = array("result"=>"true");

        return Response::json($result);
        
    }

    public function get_category(Request $request){
        // $categories = Categories::all();
        // return view('admin.categories')->with('categories',$categories);
        
        $categories = DB::table('categories')->get();
        return view('admin.categories',compact('categories'));
    
    }

    public function edit($id)
    {
        
        $aCategory = DB::table('categories AS C')
        ->where('C.category_id','=',$id)
        ->first();
        return view('admin.edit_category', compact('aCategory'));
    }

    public function update(Request $request)
    {   
        
        if($request->has("is_active")){

            $request->is_active = 1;
        }
        else{
            $request->is_active = 0;
        }

            DB::table('categories')->where('category_id','=',$request->id)->update([
                'category_name' => $request->category_name,
                'description' => $request->description,
                'is_active' => $request->is_active,
               ]);
        
        return redirect()->route('category')->with('success','Category Update Successfully...');
    }

    public function destroy($id)
    {  
        /* Actually it does not deletes only changes InActive from 1 to 0 */
        DB::table('categories')->where('category_id','=',$id)->update(['is_active' => '0']);
        return redirect()->route('category')->with('success','Category Deleted Successfully...');
    }
}
