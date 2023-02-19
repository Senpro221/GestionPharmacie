@extends('./../layouts/entete')
@section('page-content')
<div class="home-content" style="margin-top:100px; margin-left:350px;">
  <div class="overview-boxes">
    @foreach ($medicaments as $medicament)  
    <div class="box">
      <h2 class="me-2">Ordonnance</h2>
      <form method="POST" action="{{route('basket.add',$medicament->id)}}" class="form-inline d-inline-block" >
        @csrf
        @method('post')
      
        <div class="input-group">
          <input type="file" class="form-control" name="ordonnace" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
          <button type="submi" class="btn btn-outline-success"  id="inputGroupFileAddon04">Envoyer</button>
        </div>
      </form>
    </div>
  </div>
</div>
  @break
@endforeach

  @endsection