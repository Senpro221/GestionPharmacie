<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Pharmacie;
use App\Http\Requests\AppartenirRequest;
use App\Models\Panier;
use App\Models\Commande;
use App\Models\User;
use App\Models\Appartenires;
use Illuminate\Support\Facades\mail;
use App\Mail\welcomeUsername;
use Illuminate\Support\Facades\DB;
use App\Models\Medicament;
session_start();
class Connexion extends Controller
{
//========================methode qui retoune la view commander========
    public function order(Appartenires $app,Request $request)
    {
       return view('order.commande');
    }
//====================================================

    public function pharmaChoice( $id,Request $request)
    {
       $req  = $request->$id;
       return redirect('/');
      
    }

    public function choisirPharmacie($id){
      $pharma = Pharmacie::find($id);
      dd($pharma->id);
  }

  public  function detailleComme(Request $request){
    $user = Auth::user()->id;
    if($request->session()->has('idPharmacie')){
      $pharma =  session('idPharmacie');
    //dd($pharma);
    $livraison = $request->typeLivraison;

    $pane = DB::select('select id from paniers where user_id =?',[$user]);

    $medicament=DB::select('select * from appartenirs,medicaments where medicaments.id = appartenirs.id_medoc and id_panier=?',[$pane[0]->id]);
    DB::insert('insert into commandes (user_id,id_pharma,typeLivraison) values (?,?,?)', [$user,$pharma,$livraison]);

    foreach($medicament as $medicament){
         $id = $medicament->id;
         $quantites  = $medicament->quantites;
  
        $pa = DB::select('select id from commandes where user_id =?',[$user]);
        
        DB::insert('insert into orders (id_commande,id_medoc,quantiteCom) values (?,?,?)', [$pa[0]->id,$id,$quantites]);

        $this->updateStock();

        //=========================on vide le panier de l'utilisateurs=======================================
        DB::delete('delete from appartenirs where id_panier =?',[$pane[0]->id]);
        
       //dd($db)
      } 
      
       
      $pane = DB::select('select id from paniers where user_id =?',[$user]);
		
			$produit=DB::select('select * from possedes,produits where produits.id = possedes.id_prod and id_panier=?',[$pane[0]->id]);
      //DB::insert('insert into commandes (user_id,id_pharma,typeLivraison) values (?,?,?)', [$user,$pharma,$livraison]);

      foreach($produit as $produit){
			 $quantites  = $produit->quantites;
			   $id = $produit->id;
         
			   $pa = DB::select('select id from commandes where user_id =?',[$user]);
			   
			   DB::insert('insert into commande_pivos (id_commande,id_prod,quantiteCom) values (?,?,?)', [$pa[0]->id,$id,$quantites]);
	   
			   $this->updateStock();
	   
			   //=========================on vide le panier de l'utilisateurs=======================================
			   DB::delete('delete from possedes where id_panier =?',[$pane[0]->id]);
		

    }  }
      return view('order.valider');
  }

  public function listerCommandes(Request $request){
      $user = null;
      $nompharma = null;
       if($request->session()->has('nomPharmacie')){
        $nompharma =  session('nomPharmacie');
        $idPharmacie = session('idPharmacie');
       // dd($idPharmacie);
        $user =  Auth::user()->id;
       $listeCommande =  DB::select('select * from commandes where  user_id=? and id_pharma=?',[$user,$idPharmacie]);
       
       return view('order.listerCommandes',[
                  'listeCommande'=>$listeCommande,
                  'nompharma'=>$nompharma
        ]);
      }else{
          $listeCommande =  DB::select('select * from commandes where  user_id=? ORDER BY dateCommande',[$user]);
          return view('order.listerCommandes',[
                  'listeCommande'=>$listeCommande,
                  'nompharma'=>$nompharma
          ]);
      }
  }


  public function DetailsCommandes($id){
    $data = Commande::find($id);
    //dd($data->id);
    session(['idCommande'=>$data->id]);

    return redirect()->Route('DetailsCommandesProd',$id);
      
  }

  

  public function listesCommandesAll(Request $request){
    
    $listeCommande =  DB::select('select * from commandes where statut =1  || statut=2');

    return view('order.listesCommandesAll',[
      'listeCommande'=>$listeCommande,
      'request'=>$request
    ]);
    
  }


  public function listesCommandesVendeur(Request $request){
    
    $listeCommande =  DB::select('select * from commandes where statut =1  || statut=2');

    return view('order.listesCommandesVendeur',[
      'listeCommande'=>$listeCommande,
      'request'=>$request
    ]);
    
  }

  public function statutCommande(Request $request,$id){
    $data = Commande::find($id);
    //dd($data);
    if($data->statut==0){
        $data->statut=1;
    }else{
        $data->statut=0;
    }
    $data->save();
    return redirect('listerCommandes')->with('success','Cette commande a été validée avec succée.');
 }

    public function CommandeLivrer(Request $request,$id){
      $data = Commande::find($id);
      if($data->statut==1){
          $data->statut=2;
      }else{
          $data->statut=1;
      }
      $data->save();
      return redirect('listesCommandesVendeur')->with('success','Cette commande a été livrée.');
    }

    public function index()
    {
      $medicaments = Medicament::paginate(5);

       return view('dashboardcl',[
            'medicaments'=>$medicaments

       ]);
    }

    public function dashboad()
    {
      $medicaments = Medicament::all();
        if(Auth::user()->statut == '0'){
            return redirect()->back()->with('error','Votre compte n\'a pas été validé. Veuillez patienter');
          }else if(Auth::user()->statut == '1' || Auth::user()->role === 'vendeur'){
            
            // $data = Auth::user()->email;
            // Mail::to($data)->send(new welcomeUsername());
                return redirect()->Route('pagePharmacie');
          }else{
            return view('dashboardcl',compact('medicaments'));
           }
    }

    public function trimedoc()
    {
        $medicaments = Medicament::paginate(5);

        return view('dashboardTriMedoc',[
             'medicaments'=>$medicaments
 
        ]);
    }
    //editer
    public function editquantite(Appartenires $panier)
    {
        return view('basket.edit',[
            'panier'=>$panier
        ]);
    }

//===========MISE A JOUR DE LA QUANTITE=============================// 
    public function update(Request $request,$id)
     {
     $app =$request->id;
      //return dd($app);
     $app= DB::update('update appartenirs set quantites ='.$request->quantite .' where id_medoc = ?', [$app]);

      return redirect('/basket')->withMessage('La quantité a été mise à jour avec succés');
     }

//===================suppression de medicament=====================//
    public function delete(Request $request,$id)
    { 
      $user = Auth::user()->id;
//dd($id);
      $del = DB::select('select id from paniers where user_id=?',[$user]);
      //dd($del[0]->id);
      $idApp = DB::select('select id from appartenirs where id_panier = ?',[$del[0]->id]);
      //dd($idApp);
        DB::delete('delete from appartenirs where id =?',[$idApp[0]->id]);
        return redirect("/basket")->with('success', 'Médicament retiré avec succés');
    }

//==================vider le panier==============================//
    public function empty(Panier $panier)
    {
        DB::delete('delete from appartenirs');
        return redirect('/basket')->with('success','panier vider');
    }
   
    private function updateStock(){
     $app =  DB::select('select * from appartenirs,medicaments where appartenirs.id_medoc=medicaments.id');
     $stcks =  DB::select('select * from stocks,medicaments where stocks.id_medoc=medicaments.id');
     //dd($stcks);
     foreach($app as $pa){
      $reduc =  DB::update('update medicaments set quantite = '. $pa->quantite - $pa->quantites.' where id = ?', [$pa->id]);
      //  foreach($stcks as $stcks){
      //   //dd($stcks->quantiteStock);
      //   DB::update('update stocks set quantiteStock = '. $stcks->quantiteStock - $reduc.' where id = ?', [$stcks->id]);
  
      //  }
      }
    }

    public function entete(Request $request)
    {
      return view('layouts.entete',compact('request'));
    }
}

