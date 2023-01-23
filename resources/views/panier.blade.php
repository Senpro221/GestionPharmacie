
@extends('./../layouts/entete')


@section('page-content')
    
<form method="POST" action="{{ route('basket.add', $medicament) }}" class="form-inline d-inline-block" >
	{{ csrf_field() }}
	<input type="number" name="quantite" placeholder="Quantité ?" class="form-control mr-2" >
	<button type="submit" class="btn btn-warning" >+ Ajouter au panier</button>
</form>

@endsection
