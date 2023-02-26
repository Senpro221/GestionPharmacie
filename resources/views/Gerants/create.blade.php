
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
            <div style="width: 450px;">
            <form action="{{ route('createUser') }}" method="POST">
             <h2 class="text-success">Ajouter Un vendeur</h2>
             <hr>
            @csrf
            @method('post')
              <label for="nom_medoc">Nom </label>
              <input type="text" name="name" id="nom" placeholder=" Entre le Nom" value="{{ old('name')}}">

              @error('name')
            <div class="text text-danger">
              {{$message}}
            </div>
            @enderror
             <label for="nom_medoc">Prenom</label>
              <input type="text" name="prenom" id="prenom" placeholder="Entre le prenom" value="{{ old('prenom')}}">

              @error('prenom')
                <div class="text text-danger">
                {{$message}}
                </div>
              @enderror

              <label for="nom_medoc">Email</label>
              <input type="email" name="email" id="prenom" placeholder="Entre le prenom" value="{{ old('prenom')}}">

              @error('email')
                <div class="text text-danger">
                {{$message}}
                </div>
              @enderror
              
              <label for="dlc">Telephone</label>
              <input type="number" name="telephone" id="telephone" placeholder="Telephone" value="{{ old('telephone')}}">

              @error('telephone')
                <div class="text text-danger">
                {{$message}}
                </div>
              @enderror

              <label for="nom_medoc">Adresse</label>
              <input type="text" name="adress" id="adresse" placeholder="adresse" value="{{ old('adresse')}}">

              @error('adress')
                <div class="text text-danger">
                {{$message}}
                </div>
              @enderror

               <label for="password">Mot de passe</label>
              <input type="password" name="password" id="password" placeholder="Entre le password" >

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
          </div>
     
      <!-- tables -->  

        <div class="box">
        
          <table class="mtable" border="1">
            <tr>
              <th>Nom</th>
              <th>Prenom</th>
              <th>Email</th>
              <th>Adresse</th>
              <th>Telephone</th>
              <th>Action</th>

            </tr>
             @forelse($users as $user)
              {{-- @if(Auth::user()->id===$medicament->user_id) --}}
            <tr>
            
                <td>{{$user->name}}></td>
                <td>{{$user->prenom}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->adress}}</td>
                <td>{{$user->telephone}}</td>
                <td> 
                <form action="/users/{{$user->id}}/deleteVendeur" method="POST">
                  @csrf
                  @method('delete')
                  <a href="/users/{{$user->id}}/editVendeur" type="submit" class="btn btn-success mt-1">Editer</a>

                 <button type="submit" class="btn btn-danger mt-1">Supprimer</button>
                </form>
               </td>
   
            </tr>
                {{-- @else 
              @endif --}}
      
           @empty

        @endforelse

        </table>
        </div>
  </div>    
  </body>
  @endsection
</html>