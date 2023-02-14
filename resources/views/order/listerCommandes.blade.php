@extends('./../layouts/entete')
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
                <td>{{ $typeLivraison[0]->typeLivraison }}</td>
                <td>{{ $date[0]->dateCommande }}</td>
              </tr>
            @endforeach
        </tbody>
      </table>
    
    </div>
  </body>
</html

@endsection