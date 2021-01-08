<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Response;

class SettingsController extends Controller
{
    public function view(Request $request){
        $settings = DB::table('preferences')->first();
        return view('admin.settings')->with('settings',$settings);
    }
    public function update(Request $request){
        $input = $request->except('_token');
        $input['enable_tax'] = isset($input['enable_tax']) && $input['enable_tax'] == "on" ? 1 : 0;
        $update = DB::table('preferences')->where('id','1')->update($input);

        if($update){
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
