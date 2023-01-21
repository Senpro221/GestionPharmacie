<?php

namespace App\Http\Controllers;
use App\Http\Requests\medicamentRequest;
use Illuminate\Http\Request;
use App\Http\Requests\pharmaRequest;
use App\Models\Pharmacie;
use Illuminate\Support\Facades\Auth;

class MonController extends Controller
{

//     public function created2(){
//         return view('pharmacie.pharmacies');
//     }

//     public function created(){
//         return view('pharmacie.pharmacie');
//     }

   

//     public function create(Pharmacie $phamacie, pharmaRequest $request )
//     {
//        $phamacie::create([
//             'nom'=>$request->nom,
//             'adresse'=>$request->adresse,
//             'ville'=>$request->ville,
//             'quartier'=>$request->quartier,
//             'telephone'=>$request->telephone,
//             'user_id'=>Auth::id()
//        ]);
//  return redirect('/ajoutPharmacie')->with('success','Pharmacie ajouter avec succée');
//     }

   
}