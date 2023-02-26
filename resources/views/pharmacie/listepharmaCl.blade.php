
@extends('./../layouts/enteteclient')


@section('page-content')

<center>
   <div class="home-content ">
    @if (session()->has('success'))
    <div class="alert alert-success">
      {{session()->get('success')}}
    </div>
 @endif
      <div class="overview-boxes mt-5" style="margin-left: 22rem;">

      <!-- tables -->  

        <div class="box">
          <table class="mtable" border="1" style="font-family: 'Times New Roman', Times, serif; font-size: 30px;">
            <tr class="m-2">
              <th class="ms-5">Gérants</th>
              <th class="ms-5">Adresse</th>
              <th class="ms-5">Ville</th>
              <th class="ms-5">quartier</th>
              <th class="m-2">Téléphone</th>
              <th class="m-2">Nom  pharmacie</th>
              
            </tr>
             @forelse($pharmacie as $pharma)
          
            <tr>
            
                <td class="m-2">{{$pharma->prenom}}</td>
                <td>{{$pharma->adresse}}</td>
                <td>{{$pharma->ville}}</td>
                <td>{{$pharma->quartier}}</td>
                <td>{{$pharma->telephone}}</td>
                <td class="text-align:center;"><a class="btn btn-outline-success ms-2" style="text-decoration:none; font-size: 20px;" href="{{ route('choisirPharmacie',$pharma->id) }}">{{$pharma->nom}}</a></td>
                
              
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