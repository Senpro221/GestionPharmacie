
@extends('./../layouts/app')


@section('page-content')

<center>
   <div class="home-content ">
    @if (session()->has('success'))
    <div class="alert alert-success">
      {{session()->get('success')}}
    </div>
 @endif
      <div class="overview-boxes ms-5 mt-2">
      
          
     
      <!-- tables -->  

        <div class="box">
          <table class="mtable" border="1">
            <tr class="m-1">
              <th class="ms-3">logo</th>
              <th class="ms-3">Nom Pharmacies</th>
              <th class="ms-3">Adresse Phamacie</th>
              <th class="ms-3">Ville</th>
              <th class="ms-3">quartier</th>
              <th class="ms-3">Rue</th>
              <th class="m-1">Telephone</th>

              
              <th class="m-2 ms-2">Action</th>
            </tr>
            <tr>
                <td><img src="" alt="logo pharmacie"></td>
                <td class="m-1">{{$pharmacie->nom}}</td>
                <td class="m-1">{{$pharmacie->adresse}}</td>
                <td>{{$pharmacie->ville}}</td>
                <td>{{$pharmacie->quartier}}</td>
                <td>{{$pharmacie->rue}}</td>
                <td>{{$pharmacie->telephone}}</td>
              
            </tr>
  
        </table>
        </div>
  </div>    
  </body>
  </center>
  @endsection
</html>