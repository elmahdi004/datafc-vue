<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formation;

class FormationController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'Code' => 'required|unique:formations|max:255',
            'Titre' => 'required|max:255',
            'Population_cible' => 'max:255',
            'Duree' => 'max:255',
            'Objectifs' => 'max:255',
            'formationCatId' => 'required|exists:formation_categories,id',
            //'programme_formations' => 'array',
           // 'programme_formations.*.titer' => 'string|max:255',
           // 'programme_formations.*.sous_programmes' => 'array',
           // 'programme_formations.*.sous_programmes.*' => 'string|max:255',
        ]);



        $data = [];
        $data["Code"] = $request->Code;
        $data["Titre"] = $request->Titre;
        $data["Population_cible"] = $request->Population_cible||" ";
        $data["Duree"] = $request->Duree||" ";
        $data["Objectifs"] = $request->Objectifs||" ";
        $data["formation_categories_id"] = $request->formationCatId;
        $formation = Formation::create($data);
       $formation->programmeFormation()->createMany($request->programme_formations);
    }
}
