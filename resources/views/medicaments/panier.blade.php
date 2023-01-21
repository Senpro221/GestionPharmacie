
@extends('./../layouts/entete')


@section('page-content')
    
<h1>Votre panier</h1>

<div class="card mb-3" style="max-width: 540px;">
@forelse($medicament as $medicament)
  <div class="row g-0">
    <div class="col-md-4">
      <img src="image/{{ $medicament->image }}" class="img-fluid rounded-start" alt="...">
    </div>
   
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">{{$medicament->nom}}</h5>
        <p class="card-text">{{$medicament->quantite}}</p>
        <p class="card-text">{{$medicament->prix_unitaire}}</p>
        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
      </div>
    </div>
   
  </div>
  
@empty

  @endforelse
</div>

@endsection
