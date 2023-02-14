@extends('./../layouts/enteteclient')


@section('page-content')
<center><h1 class="mt-4">Produits en ligne livrés en 24h</h1></center>
<center class="mt-1">
<button type="button" class="btn btn-outline-success ms-2 fs-5">Huile de massage</button>
<a href="#" type="button" class="btn btn-outline-success ms-2 fs-5">Créme de peau</a>
<a href="#" type="button" class="btn btn-outline-success ms-2 fs-5">Créme de visage</a>
<button type="button" class="btn btn-outline-success ms-2 fs-5">Déodorant</button>
<button type="button" class="btn btn-outline-success mt-1 ms-2 fs-5">
Autres Produits</button>
</center>
</center>

<img src="{{ asset('image/banneres.jpg')}}" class="img-fluid" alt="..." style="height: 320px; width: 100%x; padding: 10px 10px;">
<hr>

@foreach($produits as $produit)
<div class="nb card float-lg-start shadow p-3 mb-1 bg-body rounded" style="max-width: 315px; height:35rem;">
   <img src="image/{{ $produit->image }}" class="card-img-top" alt="vous">
  <div class="card-body">
    <h5 class="card-title"><a href="{{route('produits.show',$produit->id )}}" class="text-success" style="text-decoration: none;">{{$produit->nom}}</a></h5>
    <p class="card-text">{{$produit->libelle}}</p>
    <p
    {{-- {{  $quantite = $medicament->quantite ===0 ?'Indisponible':'Disponible' }} 
     --}}
    @if($produit->quantite ===0 )
        <span class="alert alert-danger p-1 mb-3 ms-0 w-1">Indisponible</span>
    @else
    <span class="alert alert-success p-1 mb-3 ms-1 w-1">En stock</span>
    
    @endif
  </p >
  <a href="{{route('produits.show',$produit->id )}}"  class="btn btn-outline-success">Détail</a>
     <button type="button" class="btn btn-success">{{$produit->prix_unitaire}} fcfa</button>
     
  </div>
</div>

@endforeach


@endsection
