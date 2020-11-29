<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Rules\Password;
use App\Models\Contactus;
use Illuminate\Support\Facades\Hash;
use Response;
use DB;
use Validator;


class ContactusController extends Controller
{

    public function add_contact(Request $request){

        $data = $request->except(["_token"]);

        Contactus::insert($data);

        $result = array("result"=>"true");

        return Response::json($result);
        
    }

}
