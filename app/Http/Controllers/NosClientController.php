<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noslient;
use Illuminate\Support\Facades\Auth;

class NosClientController extends Controller
{
    public function index(){
        return Noslient::all();
    }
    public function store(Request $request){
        $valid = $request->validate([
            'name' => 'required',
            'line' => 'required',
            'image' => 'required',
        ]);
        // $datac = [];
        // $datac['href'] = $request->href;
        // $datac['Alt'] = $request->Alt;
        // $datac['isActive'] = $request->isActive||false;
        // $datac['user_id'] = $request->user()->id;
        $image_path = '';
        if ($request->hasFile('image')) {
            $image_path = $request->file('image')->store('client_logo', 'public');
            // $datac["imgSrc"] = $image_path;
        }
        Noslient::create([
            'href' => $image_path,
            'Alt' => $valid['name'],
            'user_id' => Auth::user()->id,
            'website' => $valid['line'],
            'name' => $valid['name']
        ]);
    }
    public function destroy($id){
        return Noslient::find($id)->delete();
    }
}
