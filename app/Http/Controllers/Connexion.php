<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Pharmacie;
use App\Models\Medicament;
class Connexion extends Controller
{

    public function order()
    {
        return view('order.commande');
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
        if(Auth::user()->statut == '0'){
            return redirect()->back()->with('error','votre login est innactif pour le moment');
          }else if(Auth::user()->statut == '1'){
                 $medicaments = Medicament::paginate(5);

                 return view('pharmacien',[
                     'medicaments'=>$medicaments
     
            ]);
          }else{
            return view('dashboardcl');
           }
    }

    public function trimedoc()
    {
        $medicaments = Medicament::paginate(5);

        return view('dashboardTriMedoc',[
             'medicaments'=>$medicaments
 
        ]);
    }

}

