<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
        public function login(Request $request){
            $credentials = $request->only(['email','password']);
            if(Auth::attempt($credentials)){
                return response(["user"=>Auth::user()]);
            }
            return response(["error"=>"You have an error please try again"]);
        }
        public function user(){
            return Auth::user();
        }
        public function logout(){
            Auth::logout();
            Session::flush();
            // Session::regenerate();
            return 'hello world';
        }
}
