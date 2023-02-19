<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\pharmaRequest;
use App\Models\Pharmacie;
use App\Http\Requests\medicamentRequest;
use App\Models\Panier;
use App\Models\stock;
use App\Models\Medicament;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Http\Requests\pharmaLoginRequest;
class PharmacieController extends Controller
{

    public function pagePharmacie()
    {
        return view('pharmacien');
    }

    public function contact()
    {
        return view('pharmacie.contact');
    }


    public function apropos()
    {
        return view('pharmacie.apropos');
    }

    public function alertMedoc(Request $request,$id){
         
        $medicaments = Medicament::all();
       // dd($request->quantite);
        return view('medicaments.alertMedoc',[
            'medicaments'=>$medicaments

       ]);
    }



    public function store(Medicament $medicament,stock $stock,medicamentRequest $request)
    {
       $medicament->nom = $request->nom;
        $medicament->image = $request->image;
        $medicament->categorie = $request->categorie;
        $medicament->quantite = $request->quantite;
        $medicament->prix_unitaire = $request->prix_unitaire;
        $medicament->dlc = $request->dlc;
        $medicament->libelle = $request->libelle;
        $medicament->save();

        $id = $medicament->id;
        $quantite = $medicament->quantite;
        $quantiteMin = $request->quantiteMin;

        $user = Auth::user()->id;
        $user_id_pharma = DB::select('select id from pharmacies where user_id =?',[$user]);
        foreach($user_id_pharma as $pharma)
        //print_r ( $pharma->id);exit();
        DB::insert('insert into stocks (quantiteStock,quantiteMinim,id_pharma,id_medoc) value(?,?,?,?)',[$quantite,$quantiteMin,$pharma->id,$id]);

       return redirect()->back()->with('success','Le médicament à été ajouter avec succée');
    }
}
