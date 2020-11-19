<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Rules\Password;
use App\Models\Media;
use Illuminate\Support\Facades\Hash;
use Response;
use Validator;


class MediaController extends Controller
{
    public function index(Request $request){

        return view('admin.media_upload');
        
    } 
    public function upload(Request $request){
        

        if ( $request->has("files") ){
            // dd( $request->all("files") );
            $files =  $request->file("files");
            if ( count($files)  > 0 ){
                // dd( $files );

                foreach ($request->file("files") as $key => $file) {
                    $filename = strtolower(time()."_".$file->getClientOriginalName());
                    // $path = ;
                    $file->move(public_path('/product/images'), $filename);

                    $filedata = array(
                        "name" => $file->getClientOriginalName(),
                        "path" => asset('/product/images')."/".$filename
                    );

                    Media::insert($filedata);
                }
            
            }
        }


        $is_success = 1;
        $error_msg = "success";
        die(json_encode([ 'success'=> $is_success, 'error'=> $error_msg]));
        
    }
}
