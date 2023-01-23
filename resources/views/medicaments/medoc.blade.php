
@extends('./../layouts/enteteclient')


@section('page-content')

<div class="container" style="position: relative;">
	
	<div class="row justify-content-center">

		<img src="image/{{ $medicament->image }}" class="card-img-top hover-zoom" alt="vous" style="width:220px; height:220px; margin-left:-962px; position: absolute; margin-top:30px;"> 		
	
		<div class="col-md-6">
	
			<h1>{{ $medicament->nom}}</h1>
			<h3 class="text-success" >{{ $medicament->prix_unitaire }} FCFA</h3>
			<div class="mb-3" >{!! nl2br($medicament->libelle) !!}</div>
			<div class="bg-white mt-3 p-3 border text-center" >	
				<p>Commander <strong>{{ $medicament->nom }}</strong></p>
				<form method="POST" action="basket/add/{{ $medicament->id }}" class="form-inline d-inline-block" >
					@csrf
					@method('post')
					<div style="position: relative">
					<input type="number" name="quantite" placeholder="Quantité ?" class="form-control mr-2" value="{{ isset(session('basket')[$medicament->id]) ? session('basket')[$medicament->id]['quantite'] : null }}" >
					<button type="submit" class="btn btn-success " style="position:absolute; margin-top:-40px; margin-left:113px; width:190px;">+ Ajouter au panier</button>
				</div>
				</form>
			</div>
		</div>
	
	</div>
</div>
@endsection