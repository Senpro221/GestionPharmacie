
@extends('./../layouts/entete')


@section('page-content')
<body>

  <div class="container">

  <div class=row>
    <div class="col s8 m6" >
      <img class="col mt-1 ms-5" style="width: 250px" src="/image/{{ $medicament->image }}" >
    </div>
    <div class="col s8 m4">
  
      <form  method="POST" action="#">
        @csrf
        <h4>{{ $medicament->nom }}</h4>
      <p><strong>{{ number_format($medicament->prix_unitaire, 2, ',', ' ') }} FCFA</strong></p>
      <p>{{ $medicament->libelle }}</p>
        <div class="input-field col">
          <input type="hidden" id="id" name="id" value="{{ $medicament->id }}">
          <input id="quantity" name="quantite" type="number" value="1" min="1">
          <label for="quantity">Quantité</label>        
          <p>
            <button class="btn btn-success mt-1" style="width:100%" type="submit" id="addcart">Ajouter au panier
              
            </button>
          </p>    
        </div>    
      </form>
    </div>
  </div>

</div>
@endsection
