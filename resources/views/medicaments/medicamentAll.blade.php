@extends('./../layouts/app')


@section('page-content')

<div class="home-content ">

<!-- tables -->  
<div class="overview-boxes">
<div class="box">
    <table class="mtable" border="1">
      <tr>
        <th>Nom</th>
        <th>Quantité</th>
        <th>Prix_Unitaire</th>
        <th>Catégorie</th>
        <th>Action</th>
        


      </tr>
       @forelse($medicaments as $medicament)
        {{-- @if(Auth::user()->id===$medicament->user_id) --}}
      <tr>
      
          <td>{{$medicament->nom}}></td>
          <td>{{$medicament->quantite}}</td>
          <td>{{$medicament->prix_unitaire}}</td>
          <td>{{$medicament->categorie}}</td>
          <td> 
          
            <a href="{{route('medicaments.edit',$medicament->id)}}" type="submit" class="btn btn-success mt-1">Editer</a>

           <a href="{{ route('stocks.editQuantite',$medicament->id) }}"  class="btn btn-outline-success mt-1">Ajouter votre quantite</a>
          
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