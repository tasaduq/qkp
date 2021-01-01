<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Rules\Password;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Response;
use Validator;
use Mail;

use App\Mail\RegisterVerification;

class CustomLoginController extends Controller
{
    public function login(Request $request){

        $credentials = $request->only('email', 'password');

        //$_SERVER["HTTP_REFERER"];
        $redirectTo = ""; 
        if($request->has('uri')){
            $redirectTo = $request->get('uri'); 
        }
        
        if (Auth::attempt($credentials)) {
            // Authentication passed...

            $user = Auth::user();

            if($user->verified){

                if( $user->role == "admin" ){
                    $url = "/admin/dashboard";
                }
                else {
                    $url = "/profile";
                }

                $redirectTo = $redirectTo != "" ? $redirectTo : $url;

                $result = array(
                    "result"=>"true", 
                    "url"=> $redirectTo 
                );
            }
            else{
                Auth::logout();

                $result = array(
                    "result"=>"false", 
                    "error"=>"Please verify your email"
                );    
            }
        }
        else {
            $result = array(
                "result"=>"false", 
                "error"=>"User and password did not match"
            );
        }
        
        return Response::json($result);
        
    }
    public function register(Request $request){


        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', new Password, 'confirmed'],
        ]);
        
        $verification_hash = Hash::make($request->get('name')."+".$request->get('email'));
        $result = 1;
        $result = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'verified' => 0, 
            'password' => Hash::make($request->get('password')),
            'verification_hash' => $verification_hash
        ]);

        if ($result){

            $maildata = [
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'url' => config('app.url').'verifyuser?c='.$verification_hash
            ];  

            Mail::to($request->get('email'))->send(new RegisterVerification($maildata));

            $result = array(
                "result"=>"true",  
            );
        }
        else {
            $result = array(
                "result"=>"false", 
                "error"=>"Something went wrong while creating a user, please try again later."
            );
        }

        return Response::json($result);
    }
    public function verifyuser(Request $request){
        $verifyhash = $request->get('c');
        $user = User::where([
            'verification_hash' => $verifyhash
        ])->first();
        
        if($user){
            User::where([
                'id' => $user->id
            ])->update([
                'verified' => 1,
                'email_verified_at' => date('Y-m-d H:i:s')
            ]);

            $status = 1;
        }
        else {
            $status = 0;
        }

        return view('verifyuser')->with('status',$status);
    }

    /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return \Illuminate\Http\Response
     */

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
        $userSocial = Socialite::driver($provider)->user();

        $user  =   User::where(['email' => $userSocial->getEmail()])->first();
        //print_r($users->id);die;
        if($user) {
            Auth::loginUsingId($user->id);
            if (Auth::check()) {
                return redirect()->route('profile');
            }
            return redirect('/');
        } else {
            $verification_hash = Hash::make($userSocial->getName()."+".$userSocial->getEmail());

            User::create([
                'name'          => $userSocial->getName(),
                'email'         => $userSocial->getEmail(),
                'verified' => 1,
                'email_verified_at' => date('Y-m-d H:i:s'),
                'password' => $verification_hash,
                'verification_hash' => $verification_hash,
                'profile_photo_path'         => $userSocial->getAvatar(),
                'provider_id'   => $userSocial->getId(),
                'provider'      => $provider,
            ]);

            $newUser  =   User::where(['email' => $userSocial->getEmail()])->first();
            //print_r($users);die;

            Auth::loginUsingId($newUser->id);
            if (Auth::check()) {
                return redirect()->route('profile');
            }
            return redirect('/');
        }
    }
}
