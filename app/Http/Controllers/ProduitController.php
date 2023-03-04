<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\BasketInterfaceRepository1;
use App\Repositories\BasketSessionRepository1;
use App\Models\Produit;
use App\Http\Requests\ProduitRequest;
use App\Models\Medicament;
use App\Models\Panier;
use App\Models\User;
use App\Models\Possede;
use App\Models\Commande;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class ProduitController extends Controller
{
//===================commande produit==========================/
 
	public function index(Request $request)
    {
		$user = Auth::user()->id;
		$produits = DB::select('select id from pharmacies where user_id = ?', [$user]);
	   
        //$produits = Produit::all();
		// if($request->session()->has('idPharmacie')){
		// 	$pharma =  session('idPharmacie');
		
			$produits= DB::select('select * from produits where id_pharma =?',[$produits[0]->id]);
			//dd($phar);
       return view('Produits.produit',[
            'produits'=>$produits,
			//'pharmacie' =>$pharmacie
       ]);
	//}
    }
	

    public function store(Produit $produit, ProduitRequest $request)
    {
		if($request->session()->has('idPharmacie')){
			$pharma =  session('idPharmacie');
		  //dd($pharma);
       $produit::create([
            'nom'=>$request->nom,
            'image'=>$request->image,
            'categorie'=>$request->categorie,
            'quantite'=>$request->quantite,
            'prix_unitaire'=>$request->prix_unitaire,
            'dlc'=>$request->dlc,
            'libelle'=>$request->libelle,
            'id_pharma'=>$pharma
       ]);
		
	}
       return redirect()->back()->with('success','Le produit a été ajouté avec succés');
    }
    # Affichage du panier
    public function show (Produit $produit) {
		
    	return view("Produits.show",[
			'produit'=>$produit
		]); // resources\views\basket\show.blade.php
    }

    # Ajout d'un produit au panier
    public  function add(Produit $produit, Request $request) {
		$count=0;
    	// Validation de la requête
    	$this->validate($request, [
    		"quantite" => "numeric|min:1",
			"image"=>"string"
    	]);


		if($request['quantite'] > $produit['quantite']) {
		    return back()->withMessage('La quantité demandée n\'est pas disponible');
		}else{
			$user = Auth::user()->id; 
			//=================id_panier de l'utilisateur connecter============================
			 $pane = DB::select('select id from paniers where user_id =?',[$user]);	
			$pro = $produit->id;
			$user = Auth::user()->id;
			$id = $produit->id;
			$nom= $produit->nom;
			$image= $produit->image;
			$prix=$produit->prix_unitaire;
			$quantite=$request->quantite;

			$select = DB::select('select id_panier,id_prod from possedes where id_panier=? and id_prod = ?', [$pane[0]->id,$id]);
				if($select){
						foreach($select as $sel){
							if($sel->id_panier = $pane[0]->id){
							return back()->withMessage('Produit exist  au panier');
							}else{
								$bc = DB::insert('insert into possedes (id_panier,quantites,id_prod) values (?, ?, ?)', [$c,$quantite,$id]);				
								return back()->withMessage('Produit ajouté au panier');
							}
						}			
			}else{
				$bc = DB::insert('insert into possedes (id_panier,quantites,id_prod) values (?, ?, ?)', [$pane[0]->id,$quantite,$id]);				
				return back()->withMessage('Produit ajouté au panier');
							
			}

		}
	}

		public function panierProd()
		{	
			 $user = Auth::user()->id; 
			//=================id_panier de l'utilisateur connecter============================
			 $pane = DB::select('select id from paniers where user_id =?',[$user]);
		
			 $paniers=DB::select('select * from possedes,produits where produits.id = possedes.id_prod and id_panier=?',[$pane[0]->id]);
			 $app = DB::select('select * from possedes ');

			return view("basket.listpan",[
				'paniers'=>$paniers,
				'app'=>$app
			]); 
		}
//editer
		public function edit(Produit $produit)
		{
			return view('Produits.edit',[
				'produit'=>$produit
			]);
		}

 
   //update
		public function update(Produit $produit,ProduitRequest $request)
		{
			$produit->nom = $request->nom;
			$produit->image = $request->image;
			$produit->categorie = $request->categorie;
			$produit->quantite = $request->quantite;
			$produit->prix_unitaire = $request->prix_unitaire;
			$produit->dlc = $request->dlc;
			$produit->libelle = $request->libelle;

			$produit->save();
			return redirect('ajout')->with('success', 'Le produit a été mise à jour');
   		}

		public function pharmaDetaile(User $pharmacie)
		{ 
			return view('Detailsphama',['pharmacie'=>$pharmacie]);

		}

		public function search()
		{
			$q = request()->input('q');
			// dd($q);
			$produits = Produit::where('nom', 'like', "%$q%")
			->orWhere('categorie', 'like', "%$q%")
			->paginate(6);

			return view('Produits.search')->with('produits',$produits);
		}

		public function search2()
		{
			$req = request()->input('req');
			// dd($q);
			$medicaments = Medicament::where('nom', 'like', "%$req%")
			->orWhere('categorie', 'like', "%$req%")
			->paginate(6);

			return view('medicaments.search')->with('medicaments',$medicaments);
		}

//===========MISE A JOUR DE LA QUANTITE=============================// 
		public function updateQuantite(Produit $produit ,Request $request,$id)
		{	
			$produit = DB::select('select quantite from produits where id=? ',[$request->id]);
			$quant= $request->quantite;

			$ap= DB::update('update possedes set quantites ='.$request->quantite .' where id_prod = ?', [$request->id]);
			return back()->with('success','La quantité demandée est disponible');

		}
 //suppression de produit
		public function deleteProduit(Produit $produit)
		{
			$produit->delete();
			return redirect('/ajout')->with('success', 'Le produit a été supprimé avec succés');
 		}
//===================suppression de produit dans LE panier=====================//
		public function delete(Request $request,$id)
		{ 
		$app =$request->id;
		//return dd($app);
		DB::delete('delete from possedes where id_prod =?',[$app]);
		return back()->with('success', 'Le produit  à été retiré avec succés');
		}

		   //lister produit
		   public function lister(Request $request)
		   {
			$pharma=null;
				// $produits = Produit::paginate(10);
				if($request->session()->has('idPharmacie')){
					$pharma =  session('idPharmacie');
					$produits = DB::select('select * from produits where id_pharma = ?', [$pharma]);
					return view('Produits.lister',[
						'produits'=>$produits
			
					]);
				}else{
					$produits = DB::select('select * from produits where id_pharma = ?', [$pharma]);
					return view('Produits.lister',[
						'produits'=>$produits
			
					]);
				}
		   }
//==================================lister deo et parfun=====================================//
			public function listerparfums()
		    {
			 $produits = DB::table('produits')->where('categorie', '=' ,'deodorant')->get();

	   
			  return view('Produits.listerparfums',[
				   'produits'=>$produits
	   
			  ]);
		   }

//==================================lister creme de visage=====================================//
			public function listerCrémeVisage()
		    {
			 $produits = DB::table('produits')->where('categorie', '=' ,'Créme-de-visage')->get();

	   
			  return view('Produits.listerCrémeVisage',[
				   'produits'=>$produits
	   
			  ]);
		   }

//==================================lister creme de peau=====================================//
		public function listerCremePeau()
		{
		$produits = DB::table('produits')->where('categorie', '=' ,'creme-de-peau')->get();


		return view('Produits.listerCremePeau',[
			'produits'=>$produits

		]);
		}

//==================================lister huile-de-massage=====================================//
		public function listerhuileMassage()
		{
		$produits = DB::table('produits')->where('categorie', '=' ,'huile-de-massage')->get();


		return view('Produits.listerhuileMassage',[
			'produits'=>$produits

		]);
		}

//==============================commander un produit======================	
		   public function commandeProd(Possede $app,Request $request)
		   {
			  return view('order.commandeProd');
		   }
	   
		 public  function detailleCommandeProd(Request $request){
		   
			$user = Auth::user()->id;
			if($request->session()->has('idPharmacie')){
			  $pharma =  session('idPharmacie');
			//dd($pharma);
			$livraison = $request->typeLivraison;
		
			$pane = DB::select('select id from paniers where user_id =?',[$user]);
		
			$produit=DB::select('select * from possedes,produits where produits.id = possedes.id_prod and id_panier=?',[$pane[0]->id]);
		  foreach($produit as $produit){
			 $quantites  = $produit->quantites;
			   $id = $produit->id;
			   DB::insert('insert into commandes (user_id,id_pharma,typeLivraison) values (?,?,?)', [$user,$pharma,$livraison]);
         
			   $pa = DB::select('select id from commandes where user_id =?',[$user]);
			   
			   DB::insert('insert into commande_pivos (id_commande,id_prod,quantiteCom) values (?,?,?)', [$pa[0]->id,$id,$quantites]);
	   
			   $this->updateStock();
	   
			   //=========================on vide le panier de l'utilisateurs=======================================
			   DB::delete('delete from possedes where id_panier =?',[$pane[0]->id]);
		 
			 }   
			 return view('order.validerCommandeProd');
		 }	  
		}

		public function listerCommandesProd(Request $request){
			
			$nompharma = null;
			$user = null;
			if($request->session()->has('nomPharmacie')){
				$nompharma =  session('nomPharmacie');
				//dd($nompharma);
				$user =  Auth::user()->id;
				$listeCommande =  DB::select('select * from commandes where  user_id=? ORDER BY dateCommande',[$user]);
					return view('order.listerCommandesProd',[
				'listeCommande'=>$listeCommande,
				'nompharma'=>$nompharma

				]);
			}else{
				$listeCommande =  DB::select('select * from commandes where  user_id=? ORDER BY dateCommande',[$user]);
					return view('order.listerCommandesProd',[
					'listeCommande'=>$listeCommande,
					'nompharma'=>$nompharma
					]);
			}  
		
	}

	public function DetailsCommandesProd(Request $request ,$id){
		$data = Commande::find($id);
		if($request->session()->has('idCommande')){
			$comm =  session('idCommande');
		    $detailsCom =  DB::select('select * from orders,medicaments,commandes where medicaments.id=orders.id_medoc and commandes.id=orders.id_commande and id_commande=?',[$data->id]);

		  $detailsCome =  DB::select('select * from commande_pivos,produits,commandes where produits.id=commande_pivos.id_prod and commandes.id=commande_pivos.id_commande and id_commande=?',[$data->id]);
			return view('order.DetailsCommandes',[
			  'detailsCom'=>$detailsCom,
			  'detailsCome'=>$detailsCome,
			]);
		}
	  }
	

	private function updateStock(){
		$app =  DB::select('select * from possedes,produits where possedes.id_prod=produits.id');
	   
		foreach($app as $pa){
		  DB::update('update produits set quantite = '. $pa->quantite - $pa->quantites.' where id = ?', [$pa->id]);
		  
		 }
	   }
}



   