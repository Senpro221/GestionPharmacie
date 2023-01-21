
@extends('./../layouts/entete')


@section('page-content')

<div class="container ms-2" style="max-width:50%;">
<div class=" text-success mt-1 mb-1"><h3>Détails de facturation</h3></div>
    <form class="row g-3">
    <div class="col-md-6">
        <label for="inputEmail4" class="form-label">Nom<span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="nom">
    </div>
    <div class="col-md-6">
        <label for="inputPassword4" class="form-label">Prenom<span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="prenom">
    </div>
    <div class="col-12">
        <label for="inputAddress" class="form-label">Région/Département<span class="text-danger">*</span></label>
        <select name="region" class="form-select">
        <option>Disabled select</option>
      </select>
    </div>
    <div class="col-12">
        <label for="inputAddress2" class="form-label">Numéro et nom de rue<span class="text-danger">*</label>
        <input type="text" class="form-control" name="numero" placeholder="Numéro voi et nom de la rue">
    </div>
    <div class="col-12">
        <input type="text" class="form-control" id="inputAddress2" placeholder="Bâtiment,appartement,lot etc. (facultatif)">
    </div>
    <div class="col-md-6">
    <label for="inputAddress" class="form-label">Type de livraison<span class="text-danger">*</span></label>
        <select name="region" class="form-select">
        <option>En pharmacie</option>
        <option>A domicile</option>
      </select>
    </div>
    <div class="col-md-6">
        <label name="telephone" class="form-label">Téléphone<span class="text-danger">*</label>
        <input type="number" class="form-control" name="telephone">
    </div>
    <div class="col-md-12">
        <label for="inputEmail4" class="form-label">Email<span class="text-danger">*</span></label>
        <input type="email" class="form-control" name="email"  placeholder="Votre adresse email">
    </div>
    <div class="d-grid gap-2">
        <button class="btn btn-success" type="button">Commander</button>
    </div>
</div>
@endsection