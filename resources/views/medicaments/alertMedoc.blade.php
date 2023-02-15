@extends('./../layouts/entete')
@section('page-content')

<div class="home-content" style="margin-top:100px; margin-left:350px;">
  <div class="overview-boxes">
   
    <div class="box">
      <h2 class="me-2">Ordonnance</h2>
        <div class="input-group">
          <input type="file" class="form-control" name="ordonnace" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
          <button class="btn btn-outline-success" type="button" id="inputGroupFileAddon04">Envoyer</button>
        </div>
    </div>
  </div>
</div>

  @endsection