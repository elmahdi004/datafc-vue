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
        return FormationCategorie::find($id)->with('formation.programmeFormation')->first();
    }
}
