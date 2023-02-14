
@extends('./../layouts/app')


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
            <form action="/medicaments" method="POST">
             <h2 class="text-success">Ajouter médicaments</h2>
             <hr>
            @csrf
            @method('post')
              <label for="nom_medoc">Nom medicament</label>
              <input type="text" name="nom" id="nom" placeholder="Nom du médicament" value="{{ old('nom')}}">

              @error('nom')
            <div class="text text-danger">
              {{$message}}
            </div>
            @enderror

            <label for="nom_medoc">Image</label>
            <input type="file" name="image" id="iamge">

            <label for="nom_medoc">Catégorie</label>
              <select id="categorie"  name="categorie" >
                <option value="Digestion">Digestion</option>
                <option value="DouleursFievre">Douleurs - Fièvre</option>
                <option value="Dermatologie">Dermatologie</option>
                <option value="DetenteSommeil">Détente - Sommeil</option>
                <option value="bucco-dentaires">Soins bucco-dentaires</option>
                <option value="Homéopathie">Homéopathie</option>
                <option value="bucco-dentaires">Soins bucco-dentaires</option>
                <option value="VitaminesMineraux">Vitamines - Minéraux</option>
                <option value="CirculationVeineuse">Circulation veineuse</option>
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

              
             <label for="nom_medoc">Quantité Minimum</label>
              <input type="number" name="quantiteMin" id="quantiteMin" placeholder="Quantité minimun de stock du médicament" value="{{ old('quantiteMin')}}">

              @error('quantiteMin')
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
              <input type="date" name="dlc" id="prix_unitaire" placeholder="prix du médicament" value="{{ old('prix_unitaire')}}">

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

              <button type="submit" class="btn btn-success mt-1">Ajouter et publié des médicaments</button>

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
              {{-- <th>DLC</th> --}}
              <th>Action</th>

            </tr>
             @forelse($medicaments as $medicament)
               {{-- @if(Auth::user()->id===$medicament->user_id)  --}}
            <tr>
            
                <td>{{$medicament->nom}}></td>
                <td>{{$medicament->quantite}}</td>
                <td>{{$medicament->prix_unitaire}}</td>
                <td>{{$medicament->categorie}}</td>

         
                <td> 
                <form action="{{route('medicaments.delete',$medicament->id)}}" method="POST">
                  @csrf
                  @method('delete')
                  <a href="{{route('medicaments.edit',$medicament->id)}}" type="submit" class="btn btn-success mt-1">Editer</a>

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