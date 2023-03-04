
@extends('./layouts/appVendeur')


@section('page-content')
<div class="home-content ">
  @if (session()->has('success'))
  <div class="alert alert-success">
    {{session()->get('success')}}
  </div>
@endif
<div class="overview-boxes ms-5 mt-2">
<div class="box">
    <table class="mtable" border="1">
      <tr>
        <th>Nom</th>
        <th>Quantité</th>
        <th>Prix_Unitaire</th>
        <th>Catégorie</th>
        <th>Vendre un médicament</th>

      </tr>
       @forelse($medicaments as $medicament)
         {{-- @if(Auth::user()->id===$medicament->user_id)  --}}
      <tr>
      
          <td>{{$medicament->nom}}></td>
          <td>{{$medicament->quantiteStock}}</td>
          <td>{{$medicament->prix_unitaire}}</td>
          <td>{{$medicament->categorie}}</td>
          <td> <a href="{{ route('vendre',$medicament->id) }}" class="btn btn-success ms-5">Vendre</a></td>
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