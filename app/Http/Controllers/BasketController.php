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
	
public function ajoutOrdonnance()
{
	//DB::insert('insert into commandes (image) values (?, ?)', [1, 'Dayle']);
}

    # Ajout d'un produit au panier
    public  function add(Medicament $medicament, Request $request) {
		$count=0;
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

		public function show()
		{
			 $user = Auth::user()->id; 
			//=================id_panier de l'utilisateur connecter============================
			 $pane = DB::select('select id from paniers where user_id =?'
			 ,[$user]);
			
			//print_r ($pane[0]->id);exit();
			 $medicament=DB::select('select * from appartenirs,medicaments where medicaments.id = appartenirs.id_medoc and id_panier=?',[$pane[0]->id]);
			 $app = DB::select('select * from appartenirs ');
			
		
			//$panier=DB::select('select * from paniers ');
			return view("basket.listpan",[
				'medicament'=>$medicament,
				'app'=>$app
				
			]); 
		}

	public function retour(Medicament $medicament,Request $request)
	{
		BasketController::add($medicament,$request);
		
	}
	public function shows(Medicament $medicament,stock $stock)
	{ 	
      return view("medicaments.medoc",[
        'medicament'=>$medicament,
		'stock'=>$stock
      ]);
	}

}