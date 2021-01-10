<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{

    
    public function get_users(){
        

        $paginate = config("site.pagination");

        $users = User::where('role','admin')->orWhere('role',null)->paginate($paginate);

        return view('admin/users', compact('users'))->with('i', (request()->input('page', 1) - 1) * $paginate);


    }
}
