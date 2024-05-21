<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function user(){
            if(Auth::check()){
                return "la la";
            }
            return "hello";
    }
}
