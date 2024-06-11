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
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'tel'=>'required',
            'objet'=>'required',
            'message'=>'required',
        ]);
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

        // return response('has been added',200);
    }
    public function destroy($id){
        return Message::find($id)->delete();
    }
}
