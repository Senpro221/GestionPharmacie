
@extends('./layouts/appGeran')


@section('page-content')
<div class="home-content ">
<div class="overview-boxes ms-5 mt-2">
<div class="box">
    <table class="mtable" border="1">
      <tr>
        <th>Nom</th>
        <th>Quantité</th>
        <th>Prix_Unitaire</th>
        <th>Catégorie</th>
      

      </tr>
       @forelse($medicaments as $medicament)
         {{-- @if(Auth::user()->id===$medicament->user_id)  --}}
      <tr>
      
          <td>{{$medicament->nom}}></td>
          <td>{{$medicament->quantite}}</td>
          <td>{{$medicament->prix_unitaire}}</td>
          <td>{{$medicament->categorie}}</td>
      </tr>
          {{-- @else 
        @endif
 --}}
     @empty

  @endforelse

  </table>
  </div>
</div>  
</div>  
@endsection