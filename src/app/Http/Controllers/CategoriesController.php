<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Rules\Password;
use App\Models\Categories;
use Illuminate\Support\Facades\Hash;
// use DB;
use DB,File;
use Response;
use Validator;


class CategoriesController extends Controller
{
     
        public function add_category(Request $request){

        $data = $request->except(["_token"]);

        if ( $request->hasFile("category_image") ){

            $sImgName = request()->category_image->getClientOriginalName();
            $sImgName =  strtolower(time()."_".$sImgName);
            $sPath = public_path('/category/category_gallery');
            request()->category_image->move($sPath, $sImgName);
            
            $filename = $sImgName;
           
            $data["path"] = '/category/category_gallery/'.$filename;
            $data["category_image"] = $sImgName;
        
        }


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
        
        $categories = DB::table('categories')->get();
        return view('admin.categories',compact('categories'));
    
    }

    public function edit($id)
    {
       $aCategory =DB::table('categories')
        ->where('category_id','=',$id)
        ->first();
        return view('admin.edit_category', compact('aCategory'));
    }

    public function update(Request $request)
    {   
        // $data = $request->except(["_token"]);

        if($request->has("is_active")){

            $request->is_active = 1;
        }
        else{
            $request->is_active = 0;
        }
        
        if ( $request->hasFile("category_image") ){    
            //Delete Old Image
            $image_path = public_path('/category/category_gallery/'.$request->imgname.''); 
            if(File::exists($image_path)) {
                File::delete($image_path);
            }

              
            //Move image
            $sPath = public_path('/category/category_gallery');
            $sImgName = request()->category_image->getClientOriginalName();
            request()->category_image->move($sPath, $sImgName);
            DB::table('categories')
                    ->where('category_id','=',$request->id)
                    ->update([
                        'category_name' => $request->category_name,
                        'category_image' => $sImgName,
                        'description' => $request->description,
                        'is_active' => $request->is_active,
                    ]);
        }
        else {
        
                DB::table('categories')->where('category_id','=',$request->id)->update([
                    'category_name' => $request->category_name,
                    'description' => $request->description,
                    'is_active' => $request->is_active,
                ]);
             }


        
        return redirect()->route('category')->with('success','Category Update Successfully...');
    }

    public function destroy($id)
    {  
        /* Actually it does not deletes only changes InActive from 1 to 0 */
        //DB::table('categories')->where('category_id','=',$id)->update(['is_active' => '0']);
        DB::table('categories')->where( ['category_id'=> $id])->delete();
        return redirect()->route('category')->with('success','Category Deleted Successfully...');
    }
}
