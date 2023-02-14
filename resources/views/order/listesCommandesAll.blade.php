@extends('./../layouts/appGeran')
@section('page-content')

<body>  
    <div class="home-content ">
        <div class="box">
            <div class="container">
            <h1>Mes commandes</h1>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Client</th>
                    <th>Medicament</th>
                    <th>quantite</th>
                    <th>Livraison</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($listeCom as $comm) 
                    <tr>
                        <td>{{ $nomCommande[0]->prenom }}</td>             
                        <td>{{ $comm->nom }}</td>
                        <td>{{ $comm->quantiteCom }}</td>
                        <td>{{ $typeLivraison [0]->typeLivraison }}</td>
                     </tr>
                    
                @endforeach 
                </tbody>
            </table>           
        </div>
   
    </div>    
</body>

@endsection