
@extends('./../layouts/appGeran')
@section('page-content')
<div class="home-content " style="max-width: 450rem;">
    <div class="overview-boxes" >
        <div class="box">
            <div style="max-width: 550px"> 
                <form action="{{route('stocks.update',$medicament->id)}}" method="POST">
                <h2 class="text-success">Ajouter Votre quantité</h2>
                    <hr>
                    @csrf
                    @method('get')
                    <label for="nom_medoc">Quantité</label>
                    <input type="number" name="quantite" value="{{ $medicament->quantite}}">
                    <label for="nom_medoc">Quantité minimum</label>
                    <input type="number" name="quantites" value="{{$medicament->id}} ? {{ $medicament->id,$medicament->quantites  }}: null }}">
                
                 <button type="submit" class="btn btn-success mt-1">Ajouter la quantité</button>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection