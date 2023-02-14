

@extends('./../layouts/appGeran')


@section('page-content')


   <div class="home-content ">
     @if (session()->has('success'))
              <div class="alert alert-success">
                {{session()->get('success')}}
              </div>
           @endif
      <div class="overview-boxes">
      
          <div class="box">

            <form action="{{route('produits.update',$produit->id)}}" method="POST">
             <h2 class="text-success">Modifier le produits</h2>
             <hr>
            @csrf
            @method('put')
              <label for="nom_medoc">Nom Produit</label>
              <input type="text" name="nom" id="nom" placeholder="Nom du médicament" value="{{$produit->nom}}">

              <label for="nom_medoc">Image</label>
            <input type="file" name="image" id="iamge" values="{{ $produit->image }}">
            
            
            <label for="nom_medoc">Catégorie</label>
              <select id="categorie"  name="categorie" value="{{$produit->categorie}}" >
                <option value="huile-de-massage">Huile-de-massage</option>
                <option value="deodorant">Deodorant</option>
                <option value="creme-de-peau">Creme-de-peau</option>
              </select>

            
            <label for="nom_medoc">Quantité</label>
              <input type="number" name="quantite" value="{{ $produit->quantite}}">

              <label for="nom_medoc">Prix unitaire</label>
              <input type="number" name="prix_unitaire" value="{{$produit->prix_unitaire}}">

              
              <label for="nom_medoc">Date de peremtion</label>
              <input type="datetime-local" name="dlc" id="dlc" placeholder="date" {{$produit->dlc}}>


               <label for="nom_medoc">Libelle</label>
              <textarea name="libelle" >{{$produit->libelle}}</textarea>

              <button type="submit" class="btn btn-success mt-1">Editer</button>

            </form>
            
          </div>
     
      <!-- tables -->  

    
  </div>    
  </body>
  @endsection
</html>