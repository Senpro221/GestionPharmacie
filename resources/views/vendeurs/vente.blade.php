
@extends('./../layouts/app')


@section('page-content')


   <div class="home-content ">
     @if (session()->has('success'))
              <div class="alert alert-success">
                {{session()->get('success')}}
              </div>
           @endif
      <div class="overview-boxes">
    
      <!-- tables -->  

        <div class="box">
          <table class="mtable" border="1">
            <tr>
              <th>id</th>
              <th>Nom</th>
              <th>Prix_Unitaire</th>
              <th>Catégorie</th>
              <th>Date de preremption</th>
              <th>Stock</th>
              <th>Action</th>

            </tr>
            <?php
            $count=0;
?>
             @forelse($medicaments as $medicament)
             <?php
              $count+=1;?>
              {{-- @if(Auth::user()->id===$medicament->user_id) --}}
            <tr>
                 <td>{{$medicament->user_id}}</td>
                <td>{{$medicament->nom}}></td>
                <td>{{$medicament->prix_unitaire}}</td>
                <td>{{$medicament->categorie}}</td>
                <td>{{$medicament->dlc}}</td>
                <td>{{$medicament->quantite}}</td>
                <td> 
                <form action="{{route('medicaments.update',$medicament->id)}}" method="POST">
                  @csrf
                  @method('post')
                  <a href="{{route('medicaments.vendre',$medicament->id)}}" type="submit" class="btn btn-success mt-1">Vendre</a>
                  <input type="number" name="quantite" placeholder="Quantité ?" class="form-control mr-2" value="{{ isset(session('basket')[$medicament->id]) ? session('basket')[$medicament->id]['quantite'] : null }}" >
                 <button type="submit" class="btn btn-danger mt-1">Supprimer</button>
                </form>
               </td>
   
            </tr>
                {{-- @else 
              @endif --}}
      
           @empty

        @endforelse

        </table>
        </div>
  </div>    
  </body>
  @endsection
</html>