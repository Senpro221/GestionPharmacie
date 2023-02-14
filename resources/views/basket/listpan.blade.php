
@extends('./../layouts/entete')


@section('page-content')

<div class="container">
	@if (session()->has('success'))
		<div class="alert alert-success">
		{{session()->get('success')}}
		</div>
 	@endif

	{{-- @if ($c>0) --}}
	<h1 class="text-success">Mon panier</h1>
	<div class="table-responsive  mb-3">
		<table class="table table-bordered table-hover bg-white mb-0">
			<thead class="thead-dark" >
				<tr>
					<th style="widht:45px; height:45px;">&#x1F6CD;</th>
					<th>Medicament</th>
					<th>Prix</th>
					<th>Quantité</th>
					<th>Total</th>
					<th>Opérations</th>
				</tr>
			</thead>
			<tbody>
		
				@php $total = 0 @endphp
	          
                @foreach ($medicament as $pan)
				
				@php $total += $pan->prix_unitaire * $pan->quantites @endphp
                
					<td><img src="/image/{{ $pan->image }}" class="card-img-top hover-zoom" alt="vous" style="width:50px;"></td>
                    <td>{{ $pan->nom }}</td>
                    <td>{{ $pan->prix_unitaire }}</td>
                  <td>  
                <form  action="{{route('appartenires.update',$pan->id)}}" method="POST" class="form-inline d-inline-block" >
                    @csrf
					@method('put')
                    <div style="position: relative">
						<select name="quantite" id="" class="form-control mr-2 me-4" style="width: 80px">
							<option selected="selected">{{ $pan->quantites }}</option>
							@for ($i = 1 ; $i <= ($pan->quantite) ; $i++)
								<option value="{{ $i }}"> {{ $i }} </option>
							@endfor
						</select>
                        {{-- <input type="number" name="quantite" placeholder="Quantité ?" value="{{ $pan->quantites}}" class="form-control mr-2 me-4" style="width: 80px" > --}}
                        <input type="submit" class="btn btn-outline-success float-lg-start " value="Actualiser" style="position:absolute; margin-left:94px; margin-top:-38px; width:100px;" />
                    </div>
					
                </form>
                </td>
				<td>
					
					<!-- Le total du produit = prix * quantité -->
					{{ $pan->prix_unitaire * $pan->quantites}} FCFA
				</td>
				<td>
					<!-- Le Lien pour retirer un produit du panier -->
					<a href="{{route('appartenires.delete',$pan->id) }}" type="submit" class="btn btn-outline-danger" title="Retirer le produit du panier" >Retirer</a>
				 
				</td>
				</tr>
			
			  @endforeach
			<tr colspan="2" >
			<td colspan="4" >Total général</td>
			<td colspan="2">
					
					<!-- On affiche total général -->
					<strong>{{$total }} FCFA</strong>
				</td>
			</tr>
		</tbody>

	</table>
</div>
	<!-- Lien pour vider le panier -->
	{{-- <a class="btn btn-outline-danger mb-4 fs-5" href="{{ route('basket.empty') }}" title="Retirer tous les produits du panier" >Vider le panier</a> --}}
	<a class="btn btn-outline-success  mb-4 ms-5 fs-5" href="/" title="Retourner pour conntinuer l'acha" >Continuer votre achat</a>

	<a class="btn btn-success mb-4 fs-5"  style="margin-left:720px "  href="{{ route('commande') }}" title="commander" >Commander</a>
{{-- @else --}}
{{-- 	
<div class="alert alert-info">Aucun produit au panier</div>
	
@endif --}}


</div>


@endsection