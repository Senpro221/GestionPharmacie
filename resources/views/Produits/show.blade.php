
@extends('./../layouts/enteteclient')


@section('page-content')

<div class="container" style="position: relative;">
	@if (session()->has('message'))
	<div class="alert alert-success">{{ session('message') }}</div>
	@endif

	<div class="row justify-content-center">
		<style>
			.zoom {
			  padding: 50px;
			 
			  transition: transform .6s; /* Animation */
			  width: 200px;
			  height: 200px;
			  margin: 0 auto;
			}
			
			.zoom:hover {
			  transform: scale(2.3); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
			}
			</style>
		
		<img src="image/{{ $produit->image }}" class="zoom card-img-top hover-zoom" alt="vous" style="width:240px; height:240px; margin-left:-962px; position: absolute; margin-top:20px; margin-bottom:5px ;"> 		
	
		<div class="col-md-6">
	
			<h1>{{ $produit->nom}}</h1>
			<div class="mb-3" >{!! nl2br($produit->categorie) !!}</div>
			<h3 class="text-success" >{{ $produit->prix_unitaire }} FCFA</h3>
			<div class="mb-3" >{!! nl2br($produit->libelle) !!}</div>
			<div class="bg-white mt-3 p-4 border text-center" >	
				<p>Commander <strong>{{ $produit->nom }}</strong></p>
				@if($produit->quantite >0)

				<form method="POST" action="{{route('produits.add',$produit->id)}}" class="form-inline d-inline-block" >
					@csrf
					@method('post')
					<div style="position: relative">
					<input type="number" min="1" name="quantite" placeholder="Quantité ?" class="form-control mr-2" value="{{$produit->id}}" >
					<button type="submit" class="btn btn-success " style="position:absolute; margin-top:-40px; margin-left:113px; width:190px;">+ Ajouter au panier</button>
				</div>
				</form>
				<div style="position: absolute; margin-left:42rem; margin-top:-40px;">
					<a class="btn btn-outline-success  mb-4 ms-5 fs-5" href="{{route('medicaments')}}" title="Retourner pour conntinuer l'achat" style="margin-left: 23px;" >Continuer votre achat</a>
				</div>
				@endif
			</div>
		</div>
	
	</div>
</div>
@endsection