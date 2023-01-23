<?php

namespace App\Repositories;

use App\Models\Medicament;
use Illuminate\Support\Facades\Auth;
class BasketSessionRepository implements BasketInterfaceRepository  {

	# Afficher le panier
	public function show () {
		return view("basket.show"); // resources\views\basket\show.blade.php
	}

	# Ajouter/Mettre à jour un produit du panier
	public function add (Medicament $medicament, $quantite) {		
		$basket = session()->get("basket"); // On récupère le panier en session

		// Les informations du produit à ajouter
		$medicament_details = [
			'nom' => $medicament->nom,
			'image' => $medicament->image,
			'prix_unitaire' => $medicament->prix_unitaire,
			'quantite' => $quantite,
			'user_id'=>Auth::id()
		];
		
		$basket[$medicament->id] = $medicament_details; // On ajoute ou on met à jour le produit au panier
		session()->put("basket", $basket); // On enregistre le panier
	}

	# Retirer un produit du panier
	public function remove (Medicament $medicament) {
		$basket = session()->get("basket"); // On récupère le panier en session
		unset($basket[$medicament->id]); // On supprime le produit du tableau $basket
		session()->put("basket", $basket); // On enregistre le panier
	}

	# Vider le panier
	public function empty () {
		session()->forget("basket"); // On supprime le panier en session
	}

}

?>