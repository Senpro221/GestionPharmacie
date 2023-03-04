

@extends('./../layouts/appVendeur')


@section('page-content')


   <div class="home-content ">

      <div class="overview-boxes">
      
          <div class="box">
            @foreach ($medicament as $medicament)
            <form action="{{route('stockupdate',$medicament->id)}}" method="POST">
              <h2 class="text-success">Vendre le médicaments {{ $medicament->nom }}</h2>
              <hr>
             @csrf
             @method('post')
             
             <label for="nom_medoc">Quantité</label>
               <input type="number" name="quantite" placeholder="saisir la quantité a vendre">
               <button type="submit" class="btn btn-success mt-1">Vendre</button>
 
             </form>
             
              @break
            @endforeach
            
          </div>
     
      <!-- tables -->  

    
  </div>    
  </body>
  @endsection
</html>