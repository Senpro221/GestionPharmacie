<?php

namespace App\Http\Controllers;
use App\Models\Produit;
use Illuminate\Http\Request;
use App\Http\Requests\ProduitRequest;
use Illuminate\Support\Facades\Auth;
class CartController extends Controller
{
    public function show(Produit $produit)
    {
        // $medicament = Medicament::find($id);
       
        return view('Produits.show',[

            'produit'=>$produit,
           
        ]);
    }

   

    
   
   
}
