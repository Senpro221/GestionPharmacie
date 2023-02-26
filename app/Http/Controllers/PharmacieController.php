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
    
    public function listeMedicament()
    {
        $medicaments = Medicament::all();

       return view('pharmacie.medicament',[
            'medicaments'=>$medicaments

       ]);
    }
  

    public function pagePharmacie()
    {
        $pharma = Pharmacie::all();
        
        return view('pharmacien',compact('pharma'));
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

       return redirect()->back()->with('success','Le médicament a été ajouter avec succée');
    }

    public function listePharmacl(){
    
        $pharmacie=DB::select('select * from users,pharmacies where users.id=pharmacies.user_id and statut=1');  
        //DB::select('select * from pharmacies where statut=1');
            return view('pharmacie.listepharmaCl',['pharmacie'=>$pharmacie]);
        }

        public function choisirPharmacie(Request $request,$id){
            $pharma = Pharmacie::find($id);
            session(['idPharmacie'=>$pharma->id]);
            session(['nomPharmacie'=>$pharma->nom]);

            return redirect('/');
            
        }

        public function maPharmacie(Request $request)
        {
            if($request->session()->has('idPharmacie')){
                $pharma =  session('idPharmacie');
               $pharmacie = DB::select('select * from pharmacies where id = ?', [$pharma]);

                return view('pharmacie.maPharmacie',compact('pharmacie'));
            }
        }
        //==================================editer compte utilisateur=================================//
        public function editPharmacie(Pharmacie $pharmacie)
        {
            return view('pharmacie.edit',[
                'pharmacie'=>$pharmacie
            ]);
        }
//=================================update pharmacie================================//
         public function updatePharmacie(Pharmacie $pharmacie,Request $request)
         {
            $pharmacie->nom = $request->nom;
            $pharmacie->telephone = $request->telephone;
            $pharmacie->adresse = $request->adresse;
            $pharmacie->ville = $request->ville;
            $pharmacie->quartier = $request->quartier;
            $pharmacie->save();
    
            return redirect('/maPharmacie')->with('success', 'Information  mise à jour');
         }

          //lister produit
		   public function listerProduitPharma(Request $request)
		   {
			 $user = Auth::user()->id;
             $pharma = DB::select('select id from pharmacies where user_id = ?', [$user]);
				$produits = DB::select('select * from produits where id_pharma = ?', [$pharma[0]->id]);
			 //dd($produits);
                return view('Produits.listerProduitPharma',[
				   'produits'=>$produits
	   
			  ]);
			
		   }
}
