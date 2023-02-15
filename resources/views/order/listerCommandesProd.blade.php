@extends('./../layouts/enteteclient')
@section('page-content')


<!DOCTYPE html>
<html>
  <head>
    <title>Vos commandes</title>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  </head>
  <body>
    <div class="container">
    @if ($listeCom)
      <h1 class="text-success">Vos commandes</h1>
      <hr>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>&#x1F6CD;</th>
            <th>Medicament</th>
            <th>Quantite</th>
            <th>Livraison</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($listeCom as $comm)
            <tr>
                 <td><img src="/image/{{ $comm->image }}" class="card-img-top hover-zoom" alt="vous" style="width:50px;"></td>
                <td>{{ $comm->nom }}</td>
                <td>{{ $comm->quantiteCom }}</td>
                <td>{{ $comm->typeLivraison }}</td>
                <td>{{ $comm->dateCommande }}</td>
              </tr>
            @endforeach
        </tbody>
      </table>
    @else
    <div class="alert alert-info">Aucune passée pour le moment</div>
   
    @endif
    </div>
  </body>
</html

@endsection