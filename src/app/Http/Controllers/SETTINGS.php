<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SETTINGS
{

    public static function get($key){
        $settings = DB::table('preferences')->where('id','1')->first();
        return $settings->{$key};
    }
    public static function calculate($key){
        return "0.".SELF::get($key);
    }
    

}