

@extends('./../layouts/app')


@section('page-content')


   <div class="home-content ">
     @if (session()->has('success'))
              <div class="alert alert-success">
                {{session()->get('success')}}
              </div>
           @endif
      <div class="overview-boxes">
      
          <div class="box">

            <form action="{{route('medicaments.update',$medicament->id)}}" method="POST">
             <h2 class="text-success">Ajouter médicaments</h2>
             <hr>
            @csrf
            @method('put')
              <label for="nom_medoc">Nom medicament</label>
              <input type="text" name="nom" id="nom" placeholder="Nom du médicament" value="{{$medicament->nom}}">
            
            <label for="nom_medoc">Quantité</label>
              <input type="number" name="quantite" value="{{ $medicament->quantite}}">

              <label for="nom_medoc">Prix unitaire</label>
              <input type="number" name="prix_unitaire" value="{{$medicament->prix_unitaire}}">

              <button type="submit" class="btn btn-success mt-1">Editer</button>

            </form>
            
          </div>
     
      <!-- tables -->  

    
  </div>    
  </body>
  @endsection
</html>