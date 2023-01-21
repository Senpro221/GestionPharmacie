<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use App\Http\Requests\medicamentRequest;
use App\Models\Medicament;
use Cart;
use App\Http\Controllers\Commande;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\medicamentControler;
use Illuminate\Support\Facades\DB;

class medicamentControler extends Controller
{

    public function indexVisiteur()
    {
      $medicaments = Medicament::all();

       return view('dashboardcl',[
            'medicaments'=>$medicaments

       ]);
    }


    public function index()
    {
      $medicaments = Medicament::paginate(5);

       return view('dashboardcl',[
            'medicaments'=>$medicaments

       ]);
    }

    public function indexe()
    {
        $medicaments = Medicament::all();

       return view('medicaments.medicament',[
            'medicaments'=>$medicaments

       ]);
    }
  
   public function store(Medicament $medicament, medicamentRequest $request)
    {
       $medicament::create([
            'nom'=>$request->nom,
            'image'=>$request->image,
            'categorie'=>$request->categorie,
            'quantite'=>$request->quantite,
            'prix_unitaire'=>$request->prix_unitaire,
            'libelle'=>$request->libelle,
            'user_id'=>Auth::id()
       ]);

       return redirect()->back()->with('success','Le médicament à été ajouter avec succée');
    }

    // public function accueil()
    // {
    //   $medicaments = Medicament::paginate(5);

    //    return view('dashboard',[
    //         'medicaments'=>$medicaments

    //    ]);
    // }

//methode detaille
    public function show(Medicament $medicament)
    {
        // $medicament = Medicament::find($id);

        return view('medicaments.show',[

            'medicament'=>$medicament

        ]);
    }

    public function lister()
    {
      $medicaments = Medicament::paginate(5);

       return view('medicaments.lister',[
            'medicaments'=>$medicaments

       ]);
    }
//triel douleur fiervre
    public function trie()
    {

      $medicaments = DB::table('medicaments')->where('categorie', '=' ,'DouleursFievre')->get();

       return view('medicaments.listeTrie',[
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
     public function update(Medicament $medicament,medicamentRequest $request)
     {
        $medicament->nom = $request->nom;
        $medicament->image = $request->image;
        $medicament->categorie = $request->categorie;
        $medicament->quantite = $request->quantite;
        $medicament->prix_unitaire = $request->prix_unitaire;
        $medicament->libelle = $request->libelle;

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

    
}
