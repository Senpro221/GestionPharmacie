
@extends('./layouts/entete')


@section('page-content')

<div class="container">
    @foreach($ma_commande as $commande)
    <h1>{{$commande->id}}</h1>
    @endforeach
</div>
@endsection