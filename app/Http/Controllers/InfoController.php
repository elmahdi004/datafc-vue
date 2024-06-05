<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class InfoController extends Controller
{
    public function info(){
        return Setting::all();
    }
    public function store(Request $request){
            foreach ($request->settings as $setting) {
                Setting::where('key', $setting["key"])->update(['value' => $setting["value"]]);
            }
            return response('Done',201);
            // return $request->settings[0]["key"];
    }
    public function register(Request $request){
        $valid = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'tel' => 'required',
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required',
        ]);
        $user = User::create([
            'name' =>$valid['name'],
            'email' =>$valid['email'],
            'tel' =>$valid['tel'],
            'password' =>$valid['password'],
        ]);
        Auth::login($user);
        if(Auth::check()){
            return Inertia::render('accueil/Accueil');
        }
        return Inertia::render('Auth/Login');
}
    
}
