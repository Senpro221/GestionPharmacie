@extends('./../layouts/entete')
@section('page-content')
<body>
  
<div class="position-relative">
<style>

</style>

    <img src="{{ asset('image/home.svg')}}" class="img-fluid mt-4 ms-5" alt="..." style="height: 440px; width: 40%;">

    <div class="pos position-absolute top-0 start-60">
                                  <pre><span class="tit">                                                                      SEN PHARMACIE  
                                      est une  plateforme d'achat/vente de médicament et   
                                de produits  pharmaceutique  entre pharmaciens et clients     </span>                
                                <hr>                    
                                                        <span class="tite">  AVEC SEN PHARMACIE</span>
                                          <span class="jeude text-success">Moins de médicament périmés un impact 
                                                    sur l'environnement limité</span> 
        </pre>
      </div> 
</div>   
<hr>
<div class="live bg-success text-white"> 
  <marquee>
 <img src="{{ asset('image/livraison.png')}}" width="100" height="40" class="ms mt-1 mb-3 " fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
  <span class="v1 mt-1">Aujourd'hui on Vous livre vos Médicaments à domicile ou que vous soyez au Sénégal</span>  
  </marquee>
</div>
  <hr>
@foreach($medicaments as $medicament)
<div  class="nb">
<div class=" card float-lg-start shadow p-3 mb-1 bg-body rounded" style="width: 315px; height:35rem;">
   <img src="image/{{ $medicament->image }}"  class="card-img-top hover-zoom" alt="vous">
  <div class="card-body">
    <h5 class="card-title"><a href="{{route('medicaments.show',$medicament->id)}}" class="text-success" style="text-decoration: none;">{{$medicament->nom}}</a></h5>
    <p class="card-text">{{$medicament->libelle}}</p>
    <p
    {{-- {{  $quantite = $medicament->quantite ===0 ?'Indisponible':'Disponible' }} 
     --}}
    @if($medicament->quantite === 0 )
        <span class="alert alert-danger p-1 mb-3 ms-0 w-1">Indisponible</span>
    @else
    <span class="alert alert-success p-1 mb-3 ms-1 w-1">En stock</span>
    
    @endif
  
  </p>
    <a href="{{route('medicaments.show',$medicament->id)}}"  class="btn btn-outline-success">Détail</a>
     <button type="button" class="btn btn-success ms-1">{{$medicament->prix_unitaire}} fcfa</button>
  </div>
</div>
</div>

@endforeach

  <div class='voire float-lg-start mt-2 ms-9 mb-2'>
      <button class="btn btn-outline-success fs-3 fw-bold">Voire tous les Médicaments</button>
  </div>
<hr>
  <div class='voires float-lg-start mt-5 ms-9 mb-2'>
      <h1 class=" fs-3 fw-bold">Nos Produits</h1>
  </div>
</div>
@endsection
</body>
</html>