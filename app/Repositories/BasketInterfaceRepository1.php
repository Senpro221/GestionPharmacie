<?php

namespace App\Repositories;

use App\Models\Produit;

interface BasketInterfaceRepository1 {

	// Afficher le panier
	public function show();

	// Ajouter un produit au panier
	public function add(Produit $produit, $quantite);

	// Retirer un produit du panier
	public function remove(Produit $produit);

	// Vider le panier
	public function empty();

}

?>