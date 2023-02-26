

@extends('./../layouts/appGeran')


@section('page-content')


   <div class="home-content ">
     @if (session()->has('success'))
              <div class="alert alert-success">
                {{session()->get('success')}}
              </div>
           @endif
      <div class="overview-boxes">
      
          <div class="box">

            <form action="{{route('updatePharmacie',$pharmacie->id)}}" method="POST">
             <h2 class="text-success">Modifier Votre Pharmacie</h2>
             <hr>
            @csrf
            @method('put')
              <label for="nom_medoc">Nom Pharmacie</label>
              <input type="text" name="nom" id="nom"  value="{{$pharmacie->nom}}">
            
              <label for="">Adresse</label>
              <input type="text" name="adresse" value="{{ $pharmacie->adresse}}">

              <label for="nom_medoc">Ville</label>
              <input type="text" name="ville" value="{{$pharmacie->ville}}">
             
              <label for="">Quartier</label>
              <input type="text" name="quartier" value="{{$pharmacie->quartier}}">

              <label for="nom_medoc">Téléphone</label>
              <input type="number" name="telephone" value="{{$pharmacie->telephone}}">

              <button type="submit" class="btn btn-success mt-1">Editer</button>

            </form>
            
          </div>
     
      <!-- tables -->  

    
  </div>    
  </body>
  @endsection
</html>