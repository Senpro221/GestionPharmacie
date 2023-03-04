<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\BasketInterfaceRepository;
use App\Repositories\BasketSessionRepository;
use App\Models\Medicament;
use App\Models\Panier;
use App\Models\Appartenir;
use App\Models\Produit;
use App\Models\stock;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class BasketController extends Controller
{
	
public function ajoutOrdonnance(Request $request)
{
       dd($request->quantite);
	//dd($request->ordonnace);
	session(['quantite'=>$request->quantite]);
	session(['ordonance'=>$request->ordonnace]);
	}//DB::insert('insert into commandes (image) values (?, ?)', [1, 'Dayle']);


    # Ajout d'un produit au panier
    public  function add(Medicament $medicament, Request $request) {
		$count=0;
		//$this->ajoutOrdonnance($request);
    	// Validation de la requête
    	$this->validate($request, [
    		"quantite" => "numeric|min:1",
			"image"=>"string"
    	]);
		$prod = Produit::all();
		if($request['quantite'] > $medicament['quantite']) {
		    return back()->withMessage('La quantité demandée n\'est pas disponible');
	
		}else{
			$user = Auth::user()->id;
			$panier = DB::select('select id from paniers where user_id = ?',[$user]);
			$c=$panier[0]->id;
	
			$id = $medicament->id;
			$quantite=$request->quantite;

		$select = DB::select('select id_panier,id_medoc from appartenirs where id_panier=? and id_medoc = ?', [$c,$id]);
			   if($select){
					foreach($select as $sel){
						if($sel->id_panier = $c){
						  return back()->withMessage('Médicament existe  au panier');
						}else{
							$bc = DB::insert('insert into appartenirs (id_panier,quantites,id_medoc) values (?, ?, ?)', [$c,$quantite,$id]);				
							return back()->withMessage('Produit ajouter au panier');
						}
					}			
				}else{
					$bc = DB::insert('insert into appartenirs (id_panier,quantites,id_medoc) values (?, ?, ?)', [$c,$quantite,$id]);				
					return back()->withMessage('Médicament ajouté au panier');
								
				}	
	        }
		}

		public function show(Request $request)
		{
			 $user = Auth::user()->id; 
			 
			//=================id_panier de l'utilisateur connecter============================
			 $pane = DB::select('select id from paniers where user_id =?',[$user]);
			 if($request->session()->has('nomPharmacie')){
				
				$pharma = session('idPharmacie');
			//print_r ($pane[0]->id);exit();
			 $medicament=DB::select('select * from appartenirs,medicaments,stocks where medicaments.id = appartenirs.id_medoc and id_panier=? and id_pharma=?',[$pane[0]->id,$pharma]);
			 $app = DB::select('select * from appartenirs ');
			
			//=================id_panier de l'utilisateur connecter============================
		
			 $paniers=DB::select('select * from possedes,produits where produits.id = possedes.id_prod and id_panier=? and id_pharma=?',[$pane[0]->id,$pharma]);
			 $appProd = DB::select('select * from possedes ');

		
			//$panier=DB::select('select * from paniers ');
			return view("basket.listpan",[
				'medicament'=>$medicament,
				'app'=>$app,
				'paniers'=>$paniers,
				'appProd'=>$appProd
				
			]);
		}else{
			$medicament=null;
			$paniers=null;

			return view("basket.listpan",[
				'medicament'=>$medicament,
				'paniers'=>$paniers,
				
			]);
		}
	}
	public function retour(Medicament $medicament,Request $request)
	{
		BasketController::add($medicament,$request);
		
	}
	public function shows(Medicament $medicament,stock $stock,Request $request)
	{ 	
      return view("medicaments.medoc",[
        'medicament'=>$medicament,
		'stock'=>$stock,
		'request'=>$request
      ]);
	}

}