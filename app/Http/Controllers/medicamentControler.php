<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use App\Http\Requests\medicamentRequest;
use App\Models\Medicament;
use App\Models\stock;
use App\Http\Controllers\Commande;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\medicamentControler;
use Illuminate\Support\Facades\DB;

class medicamentControler extends Controller
{

    public function indexVisiteur()
    {
      $medicaments = Medicament::paginate(5);
       return view('dashboardcl',[
            'medicaments'=>$medicaments,   
       ]);
    }

    public function index()
    {
      $medicaments = Medicament::all();
      $quantite = null;
       return view('dashboardcl',[
            'medicaments'=>$medicaments,
            'quantite'=>$quantite
       ]);
    }

    public function indexe()
    {
        $medicaments = Medicament::all();

       return view('medicaments.medicament',[
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
       
        DB::insert('insert into stocks (quantiteStock,quantiteMinim,id_medoc) value(?,?,?)',[$quantite,$quantiteMin,$id]);

       return redirect()->back()->with('success','Le médicament à été ajouter avec succée');
    }

  
//methode detaille
    public function show(Medicament $medicament)
    {
        return view('medicaments.show',[

            'medicament'=>$medicament,
           
        ]);
    }

    public function lister()
    {
      $medicaments = Medicament::paginate(10);
      $categorie='';
       return view('medicaments.lister',[
            'medicaments'=>$medicaments,
            'categorie'=>$categorie
       ]);
    }
//triel douleur fiervre
    public function trieDouleurFievre()
    {
      $medicaments = DB::table('medicaments')->where('categorie', '=' ,'DouleursFievre')->get();
       return view('medicaments.TrieDouleur',[
            'medicaments'=>$medicaments
       ]);
    }
//trie digestion
    public function triedigest()
    {
      $medicaments = DB::table('medicaments')->where('categorie', '=' ,'Digestion')->get();
       return view('medicaments.listdigest',[
            'medicaments'=>$medicaments
       ]);
    }

    //trie dermatologie
    public function dematologie()
    {
      $medicaments = DB::table('medicaments')->where('categorie', '=' ,'Dermatologie')->get();
       return view('medicaments.Dermatologie',[
            'medicaments'=>$medicaments
       ]);
    }

    //trie Homéopathie
    public function Homéopathie()
    {
      $medicaments = DB::table('medicaments')->where('categorie', '=' ,'Homéopathie')->get();
       return view('medicaments.Homéopathie',[
            'medicaments'=>$medicaments
       ]);
    }

    //trie Détente-Sommeile
    public function DetenteSommeil()
    {
      $medicaments = DB::table('medicaments')->where('categorie', '=' ,'DetenteSommeil')->get();
       return view('medicaments.DetenteSommeil',[
            'medicaments'=>$medicaments
       ]);
    }

    //trie Détente-Sommeile
    public function VitaminesMineraux()
    {
      $medicaments = DB::table('medicaments')->where('categorie', '=' ,'VitaminesMineraux')->get();

       return view('medicaments.VitaminesMineraux',[
            'medicaments'=>$medicaments
       ]);
    }
    //trie bucco-dentaires
    public function dentaires()
    {

      $medicaments = DB::table('medicaments')->where('categorie', '=' ,'bucco-dentaires')->get();

       return view('medicaments.bucco-dentaires',[
            'medicaments'=>$medicaments

       ]);
    }

     //trie CirculationVeineuse
     public function CirculationVeineuse()
     {

     $medicaments = DB::table('medicaments')->where('categorie', '=' ,'CirculationVeineuse')->get();

     return view('medicaments.CirculationVeineuse',[
          'medicaments'=>$medicaments
     ]);
     }

    public function admin()
    {
        return view('admin');
    }

    //editer
    public function edit(Medicament $medicament)
    {
        return view('medicaments.edit',[
            'medicament'=>$medicament
        ]);
    }
//update
     public function update(Medicament $medicament,Request $request)
     {
        $medicament->nom = $request->nom;
        $medicament->image = $request->image;
        $medicament->categorie = $request->categorie;
        $medicament->quantite = $request->quantite;
        $medicament->prix_unitaire = $request->prix_unitaire;
        $medicament->libelle = $request->libelle;
        $medicament->dlc = $request->dlc;
        $medicament->save();

       return redirect('/min')->with('success', 'Medicament a été mise à jour');
     }

//suppression de medicament
     public function delete(Medicament $medicament)
     {
         $medicament->delete();
         return redirect('/min')->with('success', 'Medicament a été supprimer avec succée');
     }


     public function commande()
     {$ma_commande = Commande::find($user_id); $medicament = Medicament::find('3'); // ok
         return view('commande',[
            'ma_commande'=>$ma_commande
         ]);
     }

     //totale
     function montantGlobal(){
        $liste = Medicament::all();
           $total=0;
           foreach ($liste as $medicament);
           {
              $total += $medicament['prix_unitaire'] * $medicament['quantite'];
           }
           return $total;
        }
    

   
     //recuperation
     public function panier(Medicament $medicament){
     
       
        return view('panier',[

            'medicament'=>$medicament


        ]);
     }

         public function panierhelde(){
 
        return redirect('/panier');
     }

     public function medicamentAll()
     {
         $medicaments = Medicament::all();
 
        return view('medicaments.medicamentAll',[
             'medicaments'=>$medicaments
 
        ]);
     }

     
    //editer
    public function editQuantite(Medicament $medicament, Request $request)
    {
        $dr = $request->quantite;
        //DB::insert('insert into stocks (quantiteStock, quantiteMinim, id_pharma, id_medoc) values (?, ?, ?, ?)', [1, 'Dayle']);
        return dd($dr);//view('stock.quantite',[
            //'medicament'=>$medicament
        //]);
    }
    
    
    
}
