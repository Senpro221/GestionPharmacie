
@extends('./../layouts/enteteclient')


@section('page-content')
<center><h1>Médicaments en ligne livrés en 24h</h1></center>
<center class="mt-1">
<button type="button" class="btn btn-outline-success ms-2 fs-5">Dermatologie</button>
<a href="{{route('digestion')}}" type="button" class="btn btn-outline-success ms-2 fs-5">Digestion</a>
<a href="{{route('listing')}}" type="button" class="btn btn-outline-success ms-2 fs-5">Douleurs - Fièvre</a>
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

@foreach($medicaments as $medicament)
<div class="nb card float-lg-start shadow p-3 mb-1 bg-body rounded" style="max-width: 315px; height:35rem;">
   <img src="image/{{ $medicament->image }}" class="card-img-top" alt="vous">
  <div class="card-body">
    <h5 class="card-title"><a href="/medicaments/{{$medicament->id}}" class="text-success" style="text-decoration: none;">{{$medicament->nom}}</a></h5>
    <p class="card-text">{{$medicament->libelle}}</p>
    <button class="btn btn-outline-success">{{$medicament->quantite}} comprimés</button>
     <button type="button" class="btn btn-success">{{$medicament->prix_unitaire}} fcfa</button>
     
  </div>
</div>

@endforeach
<div class='float-lg-start'>
{{$medicaments->links()}}
</div>

@endsection
