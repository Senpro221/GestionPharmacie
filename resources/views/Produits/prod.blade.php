{{-- 
@extends('./../layouts/enteteclient')


@section('page-content')

<div class="container" style="position: relative;">
	@if (session()->has('message'))
	<div class="alert alert-danger">{{ session('message') }}</div>
	@endif

	<div class="row justify-content-center">

		<img src="image/{{ $produit->image }}" class="card-img-top hover-zoom" alt="vous" style="width:220px; height:220px; margin-left:-962px; position: absolute; margin-top:20px; margin-bottom:5px ;"> 		
	
		<div class="col-md-6">
	
			<h1>{{ $produit->nom}}</h1>
			<div class="mb-3" >{!! nl2br($produit->categorie) !!}</div>
			<h3 class="text-success" >{{ $produit->prix_unitaire }} FCFA</h3>
			<div class="mb-3" >{!! nl2br($produit->libelle) !!}</div>
			<div class="bg-white mt-3 p-3 border text-center" >	
				<p>Commander <strong>{{ $produit->nom }}</strong></p>
				@if($produit->quantite >0)

				<form method="POST" action="{{ route('produits.add',$produit->id) }}" class="form-inline d-inline-block" >
					@csrf
					@method('post')
					<div style="position: relative">
					<input type="number" name="quantite" placeholder="Quantité ?" class="form-control mr-2" value="{{ isset(session('basket')[$produit->id]) ? session('basket')[$medicament->id]['quantite'] : null }}" >
					<button type="submit" class="btn btn-success " style="position:absolute; margin-top:-40px; margin-left:113px; width:190px;">+ Ajouter au panier</button>
				</div>
				</form>
				@endif
			</div>
		</div>
	
	</div>
</div>
@endsection --}}