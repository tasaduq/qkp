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
    public function fetch_images(Request $request){
        $images = Media::take(20)->get();
        echo json_encode([ 'result'=> "true", 'data'=> $images]);

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

                    $this->resize_crop_image(300, 220, public_path('/product/images')."/".$filename,  public_path('/product/images/')."thumb_".$filename);

                    $filedata = array(
                        "name" => $file->getClientOriginalName(),
                        "path" => '/product/images/'.$filename,
                        "thumb" => '/product/images/thumb_'.$filename
                    );

                    Media::insert($filedata);
                }
            
            }
        }


        $is_success = 1;
        $error_msg = "success";
        die(json_encode([ 'success'=> $is_success, 'error'=> $error_msg]));
        
    }

    function resize_crop_image($max_width, $max_height, $source_file, $dst_dir, $quality = 80){
        $imgsize = getimagesize($source_file);
        $width = $imgsize[0];
        $height = $imgsize[1];
        $mime = $imgsize['mime'];
    
        switch($mime){
            case 'image/gif':
                $image_create = "imagecreatefromgif";
                $image = "imagegif";
                break;
    
            case 'image/png':
                $image_create = "imagecreatefrompng";
                $image = "imagepng";
                $quality = 7;
                break;
    
            case 'image/jpeg':
                $image_create = "imagecreatefromjpeg";
                $image = "imagejpeg";
                $quality = 80;
                break;
    
            default:
                return false;
                break;
        }
    
        $dst_img = imagecreatetruecolor($max_width, $max_height);
        $src_img = $image_create($source_file);
    
        $width_new = $height * $max_width / $max_height;
        $height_new = $width * $max_height / $max_width;
        //if the new width is greater than the actual width of the image, then the height is too large and the rest cut off, or vice versa
        if($width_new > $width){
            //cut point by height
            $h_point = (($height - $height_new) / 2);
            //copy image
            imagecopyresampled($dst_img, $src_img, 0, 0, 0, 0, $max_width, $max_height, $width, $height_new);
        }else{
            //cut point by width
            $w_point = (($width - $width_new) / 2);
            imagecopyresampled($dst_img, $src_img, 0, 0, 0, 0, $max_width, $max_height, $width_new, $height);
        }
    
        $image($dst_img, $dst_dir, $quality);
    
        if($dst_img)imagedestroy($dst_img);
        if($src_img)imagedestroy($src_img);
    }
    
}
