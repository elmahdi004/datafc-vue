<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(){
        return Message::with('user')->get();
    }
    public function store(Request $request){
        if($request->user_id != null){
        Message::create([
            'tel'=>$request->tel,
            'read'=>0,
            'object'=>$request->objet,
            'msg'=>$request->message,
            'user_id'=>$request->user_id
        ]);
        }else{
            Message::create([
                'full_name'=>$request->name,
                'email'=>$request->email,
                'tel'=>$request->tel,
                'read'=>0,
                'object'=>$request->objet,
                'msg'=>$request->message,
            ]);
        }

        return $request;
    }
    public function destroy($id){
        return Message::find($id)->delete();
    }
}
