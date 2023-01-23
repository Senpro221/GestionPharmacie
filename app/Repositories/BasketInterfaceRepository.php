<?php

namespace App\Repositories;

use App\Models\Medicament;

interface BasketInterfaceRepository {

	// Afficher le panier
	public function show();

	// Ajouter un produit au panier
	public function add(Medicament $medicament, $quantite);

	// Retirer un produit du panier
	public function remove(Medicament $medicament);

	// Vider le panier
	public function empty();

}

?>