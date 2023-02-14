
@extends('./../layouts/enteteclient')


@section('page-content')
<center><h1>Médicaments en ligne livrés en 24h</h1></center>
<center class="mt-1">
<button type="button" class="btn btn-outline-success ms-2 fs-5">Dermatologie</button>
<a href="{{route('digestion')}}" type="button" class="btn btn-outline-success ms-2 fs-5">Digestion</a>
<a href="#" type="button" class="btn btn-outline-success ms-2 fs-5">Douleurs - Fièvre</a>
<button type="button" class="btn btn-outline-success ms-2 fs-5">Homéopathie</button>
<button type="button" class="btn btn-outline-success ms-2 fs-5">
Circulation veineuse</button>
<button type="button" class="btn btn-outline-success ms-2 fs-5">
Vitamines - Minéraux</button>

<center class="mt-1">
<button type="button" class="btn btn-outline-success mt-1 ms-2 fs-5">
Détente - Sommeil</button>
<button type="button" class="btn btn-outline-success ms-2 fs-5">
Soins bucco-dentaires</button>
<button type="button" class="btn btn-outline-success mt-1 ms-2 fs-5">
Autres médicaments</button>
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
{{$produits->links()}}

@endsection
