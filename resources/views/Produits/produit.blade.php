
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
<div style="max-width: 410px">
            <form action="{{ route('ajout') }}" method="POST">
             <h2 class="text-success">Ajouter Vos produits</h2>
             <hr>
            @csrf
            @method('post')
              <label for="nom_medoc">Nom du Produit</label>
              <input type="text" name="nom" id="nom" placeholder="Nom du produit" value="{{ old('nom')}}">

              @error('nom')
            <div class="text text-danger">
              {{$message}}
            </div>
            @enderror

            <label for="nom_medoc">Image</label>
            <input type="file" name="image" id="iamge">

            <label for="nom_medoc">Catégorie</label>
              <select id="categorie"  name="categorie" >
                <option value="huile-de-massage">Huile-de-massage</option>
                <option value="deodorant">Deodorant</option>
                <option value="creme-de-peau">Creme-de-peau</option>
                <option value="Créme-de-visage">Créme-de-visage</option>
                <option value="Déodorant">Déodorant</option>

              </select>

              @error('categorie')
                <div class="text text-danger">
                {{$message}}
                </div>
              @enderror


             <label for="nom_medoc">Quantité</label>
              <input type="number" name="quantite" id="quantite" placeholder="Quantité du médicament" value="{{ old('quantite')}}">

              @error('quantite')
                <div class="text text-danger">
                {{$message}}
                </div>
              @enderror

              <label for="nom_medoc">Prix unitaire</label>
              <input type="number" name="prix_unitaire" id="prix_unitaire" placeholder="prix du médicament" value="{{ old('prix_unitaire')}}">

              @error('prix_unitaire')
                <div class="text text-danger">
                {{$message}}
                </div>
              @enderror
              
              <label for="dlc">Date de pérempption</label>
              <input type="datetime-local" name="dlc" id="dlc" placeholder="date" value="{{ old('dlc')}}">

              @error('dlc')
                <div class="text text-danger">
                {{$message}}
                </div>
              @enderror

               <label for="nom_medoc">Libelle</label>
              <textarea name="libelle" id="libelle" placeholder="libelle du medicament">{{ old('libelle')}}</textarea>

              @error('libelle')
                <div class="text text-danger">
                {{$message}}
                </div>
              @enderror

              <button type="submit" class="btn btn-success mt-1">Ajouter et publié vos produits</button>

            </form>
          </div>
          </div>
     
      <!-- tables -->  

        <div class="box">
          <table class="mtable" border="1">
            <tr>
              <th>Nom</th>
              <th>Quantité</th>
              <th>Prix_Unitaire</th>
              <th>Catégorie</th>
              <th>Action</th>

            </tr>
             @forelse($produits as $produit)
              {{-- @if(Auth::user()->id===$produit->user_id) --}}
            {{-- <tr>
            <td><img src="image/{{ $produit->image }}" class="zoom card-img-top hover-zoom" alt="vous" style="width:220px; height:220px; margin-left:-962px; position: absolute; margin-top:20px; margin-bottom:5px ;"> 		
            </td> --}}
                <td>{{$produit->nom}}></td>
                <td>{{$produit->quantite}}</td>
                <td>{{$produit->prix_unitaire}}</td>
                <td>{{$produit->categorie}}</td>
                <td> 
                <form action="{{route('produits.delete',$produit->id)}}" method="POST">
                  @csrf
                  @method('delete')
                  <a href="{{route('produits.edit',$produit->id)}}" type="submit" class="btn btn-success mt-1">Editer</a>
                 <button type="submit" class="btn btn-danger mt-1">Supprimer</button>
                </form>
               </td>
   
            </tr>
                {{-- @else 
              @endif
       --}}
           @empty

        @endforelse

        </table>
        </div>
  </div>    
  </body>
  @endsection
</html>