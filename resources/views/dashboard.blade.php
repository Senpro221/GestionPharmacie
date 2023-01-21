
@extends('./../layouts/entete')


@section('page-content')
<body>
  
<div class="position-relative">
    <img src="{{ asset('image/home.svg')}}" class="img-fluid mt-2" alt="..." style="height: 450px; width: 50%;">

    <div class="pos position-absolute top-0 start-60">
            <pre><span class="tit">     Bienvenue dans notre plateforme
                      SEN pharmacie</span>
                 
                        
         
             <span class="jeude text-success">Jënd Mou Gaaw te Nopale</span> 
      </pre>
    </div> 
</div>   
<hr>
<div class="live bg-success text-white"> 
 <img src="{{ asset('image/livraison.png')}}" width="110" height="50" class="ms mt-2 mb-3 " fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
  <span class="v1">Faites Vous livrer vos Médicaments à domicile  24h / 24  | 7j / 7</span>  
</div>
  <hr>
@forelse($medicaments as $medicament)
<div  class="nb">
<div class=" card float-lg-start shadow p-3 mb-1 bg-body rounded" style="width: 315px; height:35rem;">
   <img src="image/{{ $medicament->image }}" class="card-img-top hover-zoom" alt="vous">
  <div class="card-body">
    <h5 class="card-title"><a href="/medicaments/{{$medicament->id}}" class="text-success" style="text-decoration: none;">{{$medicament->nom}}</a></h5>
    <p class="card-text">{{$medicament->libelle}}</p>
    <button class="btn btn-outline-success">{{$medicament->quantite}} comprimés</button>
     <button type="button" class="btn btn-success">{{$medicament->prix_unitaire}} fcfa</button>
  </div>
</div>
</div>
@empty
@endforelse

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