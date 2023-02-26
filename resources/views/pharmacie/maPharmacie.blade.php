@extends('./../layouts/appGeran')


@section('page-content')

<center>
   <div class="home-content ">
    @if (session()->has('success'))
              <div class="alert alert-success">
                {{session()->get('success')}}
              </div>
           @endif
    <div class="overview-boxes ms-5 mt-2">
        <div class="box">
          
            @foreach ($pharmacie as $pharma)
            <div class="card">
                <div class="card-header">
                    <h1>Votre Pharmacie</h1>
                </div>
                <div class="card-body">
                  <h3 class="card-title text-success">{{ $pharma->nom }}</h3>
                  <p class="card-text align-left"><strong>Adresse :</strong> {{ $pharma->adresse }}.</p>
                  <p class="card-text"><strong>Ville :</strong> {{ $pharma->ville }}.</p>
                  <p class="card-text"><strong>Quartier :</strong>  {{ $pharma->quartier }}.</p>
                  <p class="card-text"><strong>Téléphone :</strong>  {{ $pharma->telephone }}.</p>

                  <a href="{{ route('editPharmacie',$pharma->id) }}" class="btn btn-success">Modifier</a>
                </div>
              </div>
            @endforeach
           
        </div>
    </div>
   </div>
@endsection