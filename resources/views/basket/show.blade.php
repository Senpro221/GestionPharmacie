@extends('./../layouts/entete')

@section('page-content')

<div class="container">

	@if (session()->has('message'))
	<div class="alert alert-info">{{ session('message') }}</div>
	@endif

	@if (session()->has("basket"))
	<h1 class="text-success">Mon panier</h1>
	<div class="table-responsive  mb-3">
		<table class="table table-bordered table-hover bg-white mb-0">
			<thead class="thead-dark" >
				<tr>
					<th>#</th>
					<th>Medicament</th>
					<th>Prix</th>
					<th>Quantité</th>
					<th>Total</th>
					<th>Opérations</th>
				</tr>
			</thead>
			<tbody>
				<!-- Initialisation du total général à 0 -->
				@php $total = 0 @endphp

				<!-- On parcourt les produits du panier en session : session('basket') -->
				@foreach (session("basket") as $key => $item)

					<!-- On incrémente le total général par le total de chaque produit du panier -->
					@php $total += $item['prix_unitaire'] * $item['quantite'] @endphp
					<tr>
						<td>{{ $loop->iteration }}</td> 
						<td>{{ $item['nom'] }}</td>
						<td>{{ $item['prix_unitaire'] }} FCFA</td>
						<td>
							<!-- Le formulaire de mise à jour de la quantité -->
							<form method="POST" action="{{ route('basket.add', $key) }}" class="form-inline d-inline-block" >
							{{ csrf_field() }}
							<div style="position: relative">
								<input type="number" name="quantite" placeholder="Quantité ?" value="{{ $item['quantite'] }}" class="form-control mr-2 me-4" style="width: 80px" >
								<input type="submit" class="btn btn-outline-success float-lg-start " value="Actualiser" style="position:absolute; margin-left:94px; margin-top:-38px; width:100px;" />
							</div>
							</form>
						</td>
						<td>
							<!-- Le total du produit = prix * quantité -->
							{{ $item['prix_unitaire'] * $item['quantite'] }} FCFA
						</td>
						<td>
							<!-- Le Lien pour retirer un produit du panier -->
							<a href="{{ route('basket.remove', $key) }}" class="btn btn-outline-danger" title="Retirer le produit du panier" >Retirer</a>
						</td>
					</tr>
				@endforeach
				<tr colspan="2" >
					<td colspan="4" >Total général</td>
					<td colspan="2">
						<!-- On affiche total général -->
						<strong>{{ $total }} FCFA</strong>
					</td>
				</tr>
			</tbody>

		</table>
	</div>

	<!-- Lien pour vider le panier -->
	<a class="btn btn-outline-danger mb-4 fs-5" href="{{ route('basket.empty') }}" title="Retirer tous les produits du panier" >Vider le panier</a>
	<a class="btn btn-outline-success  mb-4 ms-5 fs-5" href="/" title="Retourner pour conntinuer l'acha" >Continuer votre achat</a>

	<a class="btn btn-success mb-4 fs-5"  style="margin-left:720px "  href="{{ route('commande') }}" title="commander" >Commander</a>
	
	@else
	<div class="alert alert-info">Aucun produit au panier</div>
	@endif

</div>
@endsection