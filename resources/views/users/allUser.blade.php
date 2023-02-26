
@extends('./../layouts/app')


@section('page-content')


   <div class="home-content ">
    @if (session()->has('error'))
				<div class="alert alert-danger">
					{{session()->get('error')}}
				</div>
				@endif
      <div class="overview-boxes">
      
      <!-- tables -->  

        <div class="box">
          <table class="mtable" padding-left: 10px;>
            <tr>
              
            <th class="btn btn-success mt-1 mb-1 m-md-1">
                <a href="{{route('createSuperPharmacie')}}" style="text-decoration: none; color: white;">
             
                    <img src="{{ asset('image/icons.png')}}" class="img-fluid" alt="..." style="width:30px";>Ajouter
                </a>
                </th>
               
            </tr>
            <tr>
              <th>Nom</th>
              <th>Prénom</th>
              <th>Email</th>
              <th>Téléphone</th>
              <th>Adresse</th>
              <th style="text-align: center;">Action</th>

            </tr>
            
             @forelse($users as $user)
                <td>{{$user->name}} </td>
                <td>{{$user->prenom}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->telephone}}</td>
                <td>{{$user->adress}}</td>
                <td> 
                <form action="/users/{{$user->id}}/delete" method="POST">
                  @csrf
                  @method('delete')
                  <a href="/users/{{$user->id}}/edit" type="submit" class="btn btn-success mt-1">Modifier</a>

                 <button type="submit" class="btn btn-danger mt-1">Supprimer</button>
                </form>
               </td>
            </tr>

           @empty

        @endforelse
        </table>
        </div>
  </div>    
  </body>
  @endsection
</html>