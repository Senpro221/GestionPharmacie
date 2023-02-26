

@extends('./../layouts/appSuper')


@section('page-content')


   <div class="home-content ">
     @if (session()->has('success'))
              <div class="alert alert-success">
                {{session()->get('success')}}
              </div>
           @endif
      <div class="overview-boxes">
      
          <div class="box">

            <form action="{{route('medicaments.updatemedoc',$medicament->id)}}" method="POST">
             <h2 class="text-success">Modifier médicaments</h2>
             <hr>
            @csrf
            @method('put')
              <label for="nom_medoc">Nom medicament</label>
              <input type="text" name="nom" id="nom" placeholder="Nom du médicament" value="{{$medicament->nom}}">

              <label for="nom_medoc">Image</label>
            <input type="file" name="image" id="iamge" values="{{ $medicament->image }}">
            
             
            <label for="nom_medoc">Catégorie</label>
              <select id="categorie"  name="categorie" value="{{$medicament->categorie}}" >
                <option value="{{$medicament->categorie}}">{{$medicament->categorie}}</option>
                <option value="{{$medicament->categorie}}">{{$medicament->categorie}}</option>
                <option value="{{$medicament->categorie}}">{{$medicament->categorie}}</option>
                <option value="{{$medicament->categorie}}">{{$medicament->categorie}}</option>
                <option value="{{$medicament->categorie}}">{{$medicament->categorie}}</option>
                <option value="{{$medicament->categorie}}">{{$medicament->categorie}}</option>
                <option value="{{$medicament->categorie}}">{{$medicament->categorie}}</option>
                <option value="{{$medicament->categorie}}">{{$medicament->categorie}}</option>
                <option value="{{$medicament->categorie}}">{{$medicament->categorie}}</option>
                <option value="{{$medicament->categorie}}">{{$medicament->categorie}}</option>
              </select>

            
            <label for="nom_medoc">Quantité</label>
              <input type="number" min="0" name="quantite" value="{{ $medicament->quantite}}">

              <label for="nom_medoc">Prix unitaire</label>
              <input type="number" min="0" name="prix_unitaire" value="{{$medicament->prix_unitaire}}">

              <label for="nom_medoc">Date de peremtion</label>
              <input type="date" name="dlc" id="dlc"  value="{{$medicament->dlc}}">


               <label for="nom_medoc">Libelle</label>
              <textarea name="libelle" >{{$medicament->libelle}}</textarea>


              <button type="submit" class="btn btn-success mt-1">Editer</button>

            </form>
            
          </div>
     
      <!-- tables -->  

    
  </div>    
  </body>
  @endsection
</html>