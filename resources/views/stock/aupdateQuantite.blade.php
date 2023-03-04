

@extends('./../layouts/appGeran')


@section('page-content')


   <div class="home-content ">

      <div class="overview-boxes">
      
          <div class="box">
            @foreach ($stock as $stock)
            <form action="{{route('mettreAjour',$stock->id)}}" method="POST">
              <h2 class="text-success">Mettre à jour la quantité de {{ $stock->nom }}</h2>
              <hr>
             @csrf
             @method('post')
             
             <label for="nom_medoc">QuantitéStock</label>
               <input type="number" name="quantite" value="{{ $stock->quantiteStock }}">
               <label for="nom_medoc">QuantitéMinimum</label>
               <input type="number" name="quantiteMinim" value="{{ $stock->quantiteMinim }}">
              
               <button type="submit" class="btn btn-success mt-1">Mettre à jour</button>
 
             </form>
             
              @break
            @endforeach
            
          </div>
     
      <!-- tables -->  

    
  </div>    
  </body>
  @endsection
</html>