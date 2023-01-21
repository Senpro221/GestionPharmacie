
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
            <tr class="m-2">
              <th class="ms-5">Gérants</th>
              <th class="ms-5">Adresse</th>
              <th class="ms-5">Ville</th>
              <th class="ms-5">quartier</th>
              <th class="m-2">Telephone</th>
              <th class="m-2">Nom  pharmacie</th>
              <th class="ms-5">statut</th>
              <th class="m-2 ms-2">Action</th>
            </tr>
             @forelse($pharmacie as $pharma)
            <tr>
            
                <td class="m-2">{{$pharma->prenom}}</td>
                <td>{{$pharma->adresse}}</td>
                <td>{{$pharma->ville}}</td>
                <td>{{$pharma->quartier}}</td>
                <td>{{$pharma->telephone}}</td>
                <td class="text-align:center;"><a class="btn btn-outline-success ms-2" style="text-decoration:none; " href="#">{{$pharma->nom}}</a></td>
                <td class="m-2">@if ($pharma->statut ==0)Inactive     
                  @else
                  Active    
                  @endif
                </td>
                <td class="text-align:center;"><a class="btn btn-success ms-1" style="text-decoration:none; " href="{{ route('statut',['id'=>$pharma->id]) }}">@if ($pharma->statut ==
                1)Inactive @else Active @endif</a></td>
                <td class="text-align:center;"><a class="btn btn-danger ms-1" style="text-decoration:none; " href="#">Bannir</a></td>
                
                {{-- <td>{{$pharma->Auth::user('name')}}</td> --}}
                
            </tr>

           @empty

        @endforelse
        </table>
        </div>
  </div>    
  </body>
  </center>
  @endsection
</html>