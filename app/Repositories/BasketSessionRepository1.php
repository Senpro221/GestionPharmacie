<?php

namespace App\Repositories;

use App\Models\Produit;
use Illuminate\Support\Facades\Auth;
class BasketSessionRepository1 implements BasketInterfaceRepository1  {

	# Afficher le panier
	public function show () {
		return view("basket.show"); // resources\views\basket\show.blade.php
	}

	# Ajouter/Mettre à jour un produit du panier

	public function add (Produit $produit, $quantite) {	
			
		$basket = session()->get("basket"); // On récupère le panier en session

		// Les informations du produit à ajouter
		$produit_details = [
			'nom' => $produit->nom,
			'image' => $produit->image,
			'prix_unitaire' => $produit->prix_unitaire,
			'quantite' => $quantite,
			'user_id'=>Auth::id()
		];
		
		$basket[$produit->id] = $produit_details; // On ajoute ou on met à jour le produit au panier
		session()->put("basket", $basket); // On enregistre le panier
	}

	# Retirer un produit du panier
	public function remove (Produit $produit) {
		$basket = session()->get("basket"); // On récupère le panier en session
		unset($basket[$produit->id]); // On supprime le produit du tableau $basket
		session()->put("basket", $basket); // On enregistre le panier
	}

	# Vider le panier
	public function empty () {
		session()->forget("basket"); // On supprime le panier en session
	}

}

?>