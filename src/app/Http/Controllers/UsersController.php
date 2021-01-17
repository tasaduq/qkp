<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Response;

class UsersController extends Controller
{

    
    public function get_users(Request $request){
        

        $paginate = config("site.pagination");

        
        $userName = '';
        if(trim($request->input('name')) != '') {
            $customerName = $request->input('name');
        }

        $selectedRole = 'user';
        if($selectedRole == $request->has('role')) {
            $selectedRole = $request->input('role');
        }
        
        $users = User::where(function ($query) use ($userName, $selectedRole) {
            
            if(trim($userName) != '')
            {
                $query->where('name', 'LIKE', "%{$userName}%");
            }
            if($selectedRole == "user")
            {
                $query->where('role','admin')->orWhere('role',null);
            }
            else{
                $query->where('role', $selectedRole);
            }
        })
        ->paginate($paginate);
        // dd($users);
        return view('admin/users', compact('users', 'userName', 'selectedRole' ))->with('i', (request()->input('page', 1) - 1) * $paginate);


    }
    public function update_role(Request $request){
        
        $this->validate($request, array(
            'userid' => 'required|integer',
            'role' => 'required',
        ));
        
        $userid = $request->get('userid');
        $role = $request->get('role');
        $response['result'] = 'false';

        if($role == "user"){
            User::where('id',$userid)->update(['role' => null]);
            $response['result'] = 'true';
        }
        else if($role == "admin"){
            User::where('id',$userid)->update(['role' => 'admin']);
            $response['result'] = 'true';
        }
        
        return Response::json($response);        

    }
}
