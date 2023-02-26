
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
         <div class="box">
          <table class="mtable" border="1">
            <tr class="m-2">
              <th class="ms-5">Nom</th>
              <th class="ms-5">Prénom</th>
              <th class="ms-5">Adresse</th>
              <th class="ms-5">Email</th>
              <th class="m-2">Téléphone</th>
              <th class="m-2">Etat</th>
              <th class="ms-5">statut</th>
              <th class="m-2 ms-2">Pharmacie</th>
            </tr>
             @forelse($pharmacie as $pharma)
            <tr>
              <td class="m-2">{{$pharma->name}}</td>
                <td class="m-2">{{$pharma->prenom}}</td>
                <td>{{$pharma->adress}}</td>
                <td>{{$pharma->email}}</td>
                <td>{{$pharma->telephone}}</td>
                {{-- <td class="text-align:center;"><a class="btn btn-outline-success ms-2" style="text-decoration:none; " href="#">{{$pharma->nom}}</a></td> --}}
                <td class="m-2">
                  @if ($pharma->statut == 0) Inactive     
                  @else
                  Active    
                  @endif
                </td>
                <td class="text-align:center;">
                  <a class="btn btn-success ms-1" style="text-decoration:none; "
                   href="{{ route('statut',['id'=>$pharma->id]) }}">
                    @if ($pharma->statut == 1) desactivé
                    @else Activé @endif
                  </a>
                </td>
                <td class="text-align:center;">
                  <a href="{{ route('detailPharmacie',$pharma->id) }}" 
                    class="btn btn-outline-success">Détails</a>
                </td>
            
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