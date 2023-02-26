@extends('./../layouts/entete')
@section('page-content')

    <div class="container">
    @if ($listeCommande)
      <h1 class="text-success">Vos commandes</h1>
      <hr>
      @if (session()->has('success'))
        <div class="alert alert-success">
            {{session()->get('success')}}
        </div>
      @endif
      <table class="table table-striped">
        <thead>
          <tr>
            
            <th>Pharmacie</th>
            <th>Date</th>
            <th>Livraison</th>
            <th>Statut</th>
            <th>......</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($listeCommande as $comm)
            <tr>
                <td>{{ $nompharma }}</td>
                <td>{{ $comm->dateCommande }}</td>
                <td>{{ $comm->typeLivraison }}</td>
                <td>validé</td>
             
                <td>
                  {{-- @if ($comm->statut == 0)
                  <a  href="{{ route('statutCommande',$comm->id) }}" class="btn btn-success">Valider</a>
                  @endif --}}
                  <a  href="{{ route('DetailsCommandes',$comm->id) }}" class="btn btn-info">Details</a>
                </td>
              </tr>
            @endforeach
        </tbody>
      </table>
      @else
      <div class="alert alert-info">Aucune commande passée pour le moment</div>
     
      @endif
    </div>
  </body>
</html

@endsection