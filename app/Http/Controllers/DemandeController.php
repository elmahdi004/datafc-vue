<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use Illuminate\Http\Request;

class DemandeController extends Controller
{
    public function index(){
        return Demande::orderBy('created_at','desc')->with(['formation','user'])->get();
    }
}
