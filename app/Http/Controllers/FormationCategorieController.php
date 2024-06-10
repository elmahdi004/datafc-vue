<?php

namespace App\Http\Controllers;

use App\Models\FormationCategorie;
use Illuminate\Http\Request;

class FormationCategorieController extends Controller
{
    public function index(){
        return FormationCategorie::all();
    }
    public function show($id){
        return FormationCategorie::where('id',$id)->with('formation.programmeFormation')->first();
    }
    public function store(Request $request){
        $validRequest = $request->validate([
            'code' => 'required',
            'title' => 'required'
        ]);
        FormationCategorie::create([
            'CodeFormation' => $validRequest['code'],
            'Titre' => $validRequest['title'],
        ]);
    }
}
