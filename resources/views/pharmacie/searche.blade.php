@extends('./../layouts/enteteclient')
@section('page-content')

    <h4>Bare de recherche</h4>
    <div class="row">
        <div class="col-md-8">
            <form method="get" action="/" style="display: flex">
                @method('get')
                <input type="text" placeholder="Rechercher" class="form-control no-border=input" name="search">

                <button class="btn btn-primary no-border=button" type="submit">rechercher</button>

            </form>
        </div>
    </div>
    <div class="row mt-2">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <th class="ms-5">Logo</th>
                    <th>Gérants</th>
                    <th>Adresse</th>
                    <th>Ville</th>
                    <th>quartier</th>
                    <th>Téléphone</th>
                    <th>Choisir votre pharmacie</th>
                    <th>Action</th>
                
                </thead>
                <tbody>
                    @foreach ($phamacie as $pharma)
                   <tr>
                    <td class="m-2"><img src="" alt="logo pharmacie"></td>
                        <td class="m-2">{{$pharma->prenommail}}</td>
                        <td>{{$pharma->adresse}}</td>
                        <td>{{$pharma->ville}}</td>
                        <td>{{$pharma->quartier}}</td>
                        <td>{{$pharma->telephone}}</td>
                        <td class="text-align:center;"><a class="btn btn-outline-success ms-5" style="text-decoration:none; " href="#">{{$pharma->nom}}</a></td>
                        
                    </tr>
        
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection