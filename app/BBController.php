<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\BasketInterfaceRepository;
use App\Repositories\BasketSessionRepository;
use App\Models\Medicament;

class BBController extends Controller
{

  public  function add(Medicament $medicament, Request $request) {
		
		$count=0;
    	// Validation de la requête
    	$this->validate($request, [
    		"quantite" => "numeric|min:1",
			"image"=>"string"
    	]);


		if($request['quantite'] > $medicament['quantite']){
		    return back()->withMessage('La quantite demander n\'est pas disponible');
		}else{
    	// Ajout/Mise à jour du produit au panier avec sa quantité
		return  redirect()->route("/entete",compact('count'));
    	$this->basketRepository->add($medicament, $request->quantite);
			$count+=1;
    	// Redirection vers le panier avec un message
    	return redirect()->route("basket.show",compact('count'))->withMessage("Produit ajouté au panier");
		
  }
}}
