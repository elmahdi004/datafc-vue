<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use App\Models\PersMorale;
use App\Models\PersPhysique;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DemandeController extends Controller
{
    public function index(){
        return Demande::orderBy('created_at','desc')->with(['formation','user','demandeable'])->get();
    }
    public function storePhysique(Request $request){
        // return response(['request',$request],200);
        $validRequest =  $request->validate([
            'nom' => 'required|min:3',
            'prenom' => 'required',
            'email' =>'required',
            'tel' =>'required',
            'adresse' =>'required',
            'typeOrg' =>'required',
            'nomOrg' =>'required',
            'nbr' =>'required',
        ]);
        $physique = PersPhysique::create([
            'prenompm' => $validRequest['prenom'],
            'nompm' => $validRequest['nom'],
            'typeOrgpm' => $validRequest['typeOrg'],
            'nomOrgpm' => $validRequest['nomOrg'],

        ]);
        Demande::create([
            'demandeable_type' => 'App\Models\PersPhysique',
            'demandeable_id' => $physique->id,
            'email' => $validRequest['email'],
            'tel' => $validRequest['tel'],
            'adresse' => $validRequest['adresse'],
            'nbrpers' => $validRequest['nbr'],
            'status' => 0,
            'user_id' => auth()->user()->id,
            'formation_id' => $request->formationId
        ]);
        return Redirect::back()->with([
            'data' => 'Something you want to pass to front-end',
        ]);
    }

    public function storeMoral(Request $request){

        // return response(['request',$request],200);
        $validRequest =  $request->validate([
            'entreprise' => 'required|min:3',
            'raison_sociale' => 'required',
            'email' =>'required',
            'tel' =>'required',
            'adresse' =>'required',
            'responsable' =>'required',
            'responsableTel' =>'required',
            'nbr' =>'required',
        ]);
        $moral = PersMorale::create([
            'entreprise' => $validRequest['entreprise'],
            'raisons' => $validRequest['raison_sociale'],
            'resplonsable' => $validRequest['responsable'],
            'telres' => $validRequest['responsableTel'],
        ]);
        Demande::create([
            'demandeable_type' => 'App\Models\PersMorale',
            'demandeable_id' => $moral->id,
            'email' => $validRequest['email'],
            'tel' => $validRequest['tel'],
            'adresse' => $validRequest['adresse'],
            'nbrpers' => $validRequest['nbr'],
            'status' => 0,
            'user_id' => auth()->user()->id,
            'formation_id' => $request->formationId
        ]);
        return Redirect::back()->with([
            'data' => 'Something you want to pass to front-end',
        ]);
    }
}
