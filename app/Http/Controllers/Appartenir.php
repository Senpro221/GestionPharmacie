<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Medicament;
class Appartenir extends Controller
{
    public function commander(Request $request)
    {
        $app = DB::select('select * from appartenirs');
			foreach($panier as $pan)
			$c = $pan->id;
			

			$user = Auth::user()->id;	
			$id = $medicament->id;
			$quantite=$request->quantite;
    }

   
}
