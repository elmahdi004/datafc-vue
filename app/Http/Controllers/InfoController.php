<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

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
    
}
