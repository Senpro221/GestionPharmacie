
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

            <form action="/users/{{$user->id}}/updateVendeur" method="POST">
             <h2 class="text-success">Editer Un compte vendeur</h2>
             <hr>
            @csrf
            @method('put')
              <label for="nom_medoc">Nom </label>
              <input type="text" name="name" id="nom"  value="{{ $user->name}}">

              @error('name')
            <div class="text text-danger">
              {{$message}}
            </div>
            @enderror
             <label for="nom_medoc">Prénom</label>
              <input type="text" name="prenom" id="prenom"  value="{{ $user->prenom}}">


              <label for="nom_medoc">Email</label>
              <input type="email" name="email" id="email"  value="{{ $user->email}}">

              
              <label for="dlc">Téléphone</label>
              <input type="number" name="telephone" id="telephone"  value="{{ $user->telephone}}">


              <label for="nom_medoc">Adresse</label>
              <input type="text" name="adress" id="adresse"  value="{{ $user->adress}}">

              @error('adress')
                <div class="text text-danger">
                {{$message}}
                </div>
              @enderror

               <label for="password">Mot de passe</label>
              <input type="password" name="password" id="password" value="{{ $user->password }}" >

              @error('password')
                <div class="text text-danger">
                {{$message}}
                </div>
              @enderror

              <label for="nom_medoc">Profil</label>
              <select name="role" id="adresse" >
                <option value="vendeur">Vendeur</option>
              </select>
              @error('role')
                <div class="text text-danger">
                {{$message}}
                </div>
              @enderror

              <button type="submit" class="btn btn-success mt-1">Ajouter Le</button>

            </form>
            
          </div>
     
      <!-- tables -->  

  </div>    
  </body>
  @endsection
</html>