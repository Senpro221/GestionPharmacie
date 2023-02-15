<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Pharmacie;
use App\Http\Requests\AppartenirRequest;
use App\Models\Panier;
use App\Models\User;
use App\Models\Appartenires;
use Illuminate\Support\Facades\mail;
use App\Mail\welcomeUsername;
use Illuminate\Support\Facades\DB;
use App\Models\Medicament;

class Connexion extends Controller
{

    public function order(Appartenires $app,Request $request)
    {
      
       return view('order.commande');
    }

  public  function detailleComme(Request $request){
    
    $user = Auth::user()->id;
    $livraison = $request->typeLivraison;

    $pane = DB::select('select id from paniers where user_id =?',[$user]);

    $medicament=DB::select('select * from appartenirs,medicaments where medicaments.id = appartenirs.id_medoc and id_panier=?',[$pane[0]->id]);
      foreach($medicament as $medicament){
        $cb  =  $medicament->prix_unitaire * $medicament->quantites;
        $id = $medicament->id;
          
        DB::insert('insert into commandes (user_id,typeLivraison) values (?,?)', [$user,$livraison]);
         
        $pa = DB::select('select id from commandes where user_id =?',[$user]);
    
        DB::insert('insert into orders (id_commande,id_medoc,quantiteCom) values (?,?,?)', [$pa[0]->id,$id,$cb]);

        $this->updateStock();

        //=========================on vide le panier de l'utilisateurs=======================================
        DB::delete('delete from appartenirs where id_panier =?',[$pane[0]->id]);
       
      }   
      return view('order.valider');
  }

public function listerCommandes(){
   $user = Auth::user()->id;
   $nom = Auth::user()->prenom;
   $typeLivraison = DB::select('select typeLivraison from commandes where user_id=?',[$user]);
   $date = DB::select('select dateCommande from commandes where user_id=?',[$user]);

   //dd($typeLivraison[0]->typeLivraison);
   $commande = DB::select('select id from commandes where user_id =?',[$user]);
   if($commande ){
    $listeCom =  DB::select('select * from orders,medicaments where medicaments.id=orders.id_medoc and id_commande=?',[$commande[0]->id]);

      return view('order.listerCommandes',[
        'listeCom'=>$listeCom,
        'nom'=>$nom,
        'date'=>$date,
        'commande'=>$commande,
        'typeLivraison'=>$typeLivraison
      ]);
   }else{
      $listeCom =  DB::select('select * from orders,medicaments where medicaments.id=orders.id_medoc');

        return view('order.listerCommandes',[
          'listeCom'=>$listeCom,
          'nom'=>$nom,
          'date'=>$date,
          'commande'=>$commande,
          'typeLivraison'=>$typeLivraison
        ]);
   }  
}


public function listesCommandesAll(){
$nomCommande = DB::select('select * from users,commandes where users.id = commandes.user_id');
  // foreach($nomCommande as $nomC)
  //   print_r($nomC->prenom);exit();
  $typeLivraison = DB::select('select typeLivraison from commandes,users where commandes.user_id=users.id');
  $listeCom =  DB::select('select * from orders,medicaments where medicaments.id=orders.id_medoc and id_commande');
$nomCommande = DB::select('select prenom from users,commandes where users.id = commandes.user_id');

   return view('order.listesCommandesAll',[
     'listeCom'=>$listeCom,
     'nomCommande'=>$nomCommande,
     'typeLivraison'=>$typeLivraison
   ]);
   
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
            return redirect()->back()->with('error','votre compte n\'a pas été valider veuillez patienter');
          }else if(Auth::user()->statut == '1'){
            
            $data = Auth::user()->email;
            Mail::to($data)->send(new welcomeUsername());
                 return view('pharmacien');
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
    public function editquantite(Appartenire $panier)
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

      return redirect('/basket')->withMessage('quantite mise a jour avec succee');
     }

//===================suppression de medicament=====================//
    public function delete(Request $request,$id)
    { 
      
      $user = Auth::user()->id;

      $del = DB::select('select id from paniers where user_id=?',[$user]);
      $idApp = DB::select('select id from appartenirs where id_panier = ?',[$del[0]->id]);
      //dd($idApp[0]->id);
        DB::delete('delete from appartenirs where id =?',[$idApp[0]->id]);
        return redirect("/basket")->with('success', 'Medicament retiré avec succée');
    }

//==================vider le panier==============================//
    public function empty(Panier $panier)
    {
        DB::delete('delete from appartenirs');
        return redirect('/basket')->with('success','panier vider');
    }
   
    private function updateStock(){
     $app =  DB::select('select * from appartenirs,medicaments where appartenirs.id_medoc=medicaments.id');
    
     foreach($app as $pa){
       DB::update('update medicaments set quantite = '. $pa->quantite - $pa->quantites.' where id = ?', [$pa->id]);
       
      }
    }
}

