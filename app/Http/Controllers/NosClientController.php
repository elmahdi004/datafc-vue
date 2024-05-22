<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noslient;

class NosClientController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'href' => 'required',
            'Alt' => 'required',
            'isActive' => 'boolean' ,
            'photo' => 'required',
        ]);
        $datac = [];
        $datac['href'] = $request->href;
        $datac['Alt'] = $request->Alt;
        $datac['isActive'] = $request->isActive||false;
        $datac['user_id'] = $request->user()->id;
        if ($request->hasFile('photo')) {
            $image_path = $request->file('photo')->store('client_logo', 'public');
            $datac["imgSrc"] = $image_path;
        }
        Noslient::create($datac);
    }
}
