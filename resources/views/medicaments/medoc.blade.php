
@extends('./../layouts/entete')
@section('page-content')

<div class="container" style="position:relative;" style="max-width: 40rem">
	@if (session()->has('message'))
	<div class="alert alert-success">{{ session('message') }}</div>
	@endif

	<div class="row justify-content-center " >
		<style>
			.zoom {
			  padding: 50px;
			 
			  transition: transform .6s; /* Animation */
			  width: 150px;
			  height: 150px;
			  margin: 0 auto;
			}
			
			.zoom:hover {
			  transform: scale(2.3); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
			}
			</style>
		
		<img src="image/{{ $medicament->image }}" class="zoom card-img-top hover-zoom" alt="vous" style="width:220px; height:220px; margin-left:-962px; position: absolute; margin-top:20px; margin-bottom:5px ;"> 		
	
		<div class="col-md-6">
	
			<h2 class="text-success">{{ $medicament->nom}}</h2>
			<div class="mb-3" >{!! nl2br($medicament->categorie) !!}</div>
				<h3 class="text-success" >{{ $medicament->prix_unitaire }} FCFA</h3>
				
				<div class="mb-3" >{!! nl2br($medicament->libelle) !!}</div>
				
				@if ($medicament->categorie === 'sous-ordonence')
							
					<div class="bg-white mt-5 p-3 border text-center" >	
						
							<p>Commander <strong>{{ $medicament->nom }}</strong></p>
							
							@if($medicament->quantite >0)
								<!-- Button trigger modal -->
							
							<div style="position: relative">
								<input type="number" style="width:400px;" name="quantite" min="1" placeholder="Quantité ?" class="form-control mr-2" value="{{$medicament->id}} ? {{ $medicament->id,$medicament->quantite  }}: null }}" >
								<button type="button" class="btn btn-success " data-bs-toggle="modal" data-bs-target="#exampleModal" style="position:absolute; margin-top:-40px; margin-left:113px; width:190px;">+ Ajouter au panier</button>
							</div>
						
	<!-- Modal -->
					<div class="modal fade" style="margin-top: 150px;" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h1 class="modal-title fs-2 text-danger ms-5" id="exampleModalLabel">Attention !!!</h1>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
									Pour commander ce médicament Vous devez soumettre votre ordonnance.
								</div>
								<form method="POST" action="{{route ('alertMedoc',$medicament->id) }}" class="form-inline d-inline-block" >
								@csrf
								@method('post')
								<div class="modal-footer">
									<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
								
									<button type="success" class="btn btn-outline-success">Soumettre l'ordonnance</button>
									
								</div>
							</div>
						</div>
					</div>

					@endif
				@else
				
				@if($medicament->quantite >0)

				<form method="POST" action="{{route('basket.add',$medicament->id)}}" class="form-inline d-inline-block" >
					@csrf
					@method('post')
					<div style="position: relative">
					<input type="number" style="margin-bottom: 30px;" name="quantite" min="1" placeholder="Quantité ?" class="form-control mr-2" value="{{$medicament->id}} ? {{ $medicament->id,$medicament->quantite  }}: null }}" >
					<button type="submit" class="btn btn-success " style="position: absolute;margin-top:-65px; margin-left:220px; width:190px;">+ Ajouter au panier</button>
				</div>
				
				</form>
				@endif
				@endif
				<div style="position: absolute; margin-left:42rem; margin-top:-55px; ">
					<a class="btn btn-outline-success fs-5" href="{{route('medicaments')}}" title="Retourner pour conntinuer l'achat" style="" >Continuer votre achat</a>
				   </div>
			</div>
		</div>
	
	</div>
</div>
@endsection