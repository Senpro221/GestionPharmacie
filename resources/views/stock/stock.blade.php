
@extends('./layouts/appGeran')


@section('page-content')
<div class="home-content" style="margin-left: 5rem;">
     @if (session()->has('success'))
              <div class="alert alert-success">
                {{session()->get('success')}}
              </div>
           @endif
    <div class="overview-boxes ms-5 mt-1">
        <div class="box">
            <table class="mtable" border="1">
                <tr>
                    <th>Nom médicaments</th>
                    <th>Quantité en stock</th>
                    <th>Quantité minimum</th>
                    <th>Date actuelle</th>
                    <th>Date de péremption</th>
                    <th>Action</th>
                </tr>
                @foreach($stocks as $stock ) 
                    <tr class="bla">
                        <td>{{ $stock->nom }}</td>
                        @if ($stock->quantiteStock <= $stock->quantiteMinim)
                        
                            <td  class="alert alert-warning" role="alert">{{ $stock->quantiteStock }} minimum</td>
                          
                        @else
                        <td>{{ $stock->quantiteStock }}</td>
                        @endif
                        <td>{{ $stock->quantiteMinim }}</td>
                        @php
                            $date = gmdate('d-M-Y');
                            $current_datetime = Carbon\Carbon::now();
                        @endphp
                        <td>{{ $current_datetime }}</td>
                        
                        @if ($current_datetime >= $stock->dlc)
                      
                       <td class="alert alert-danger" role="alert">{{ $stock->dlc }}</td> 
                        
                            @if ($stock->statut == 0)
                            <td> <a href="{{ route('statutmedicaments',$stock->id) }}" class="btn btn-danger">Desactiver</a> </td> 
                            
                            @endif
                     
                       @else
                        <td>{{ $stock->dlc }}</td>

                        <form action="{{ route('ajoutMedoc',$stock->id) }}" method="POST">
                            @csrf
                             <td> <button type="submit" class="btn btn-success">Ajouter</button></td> 
                       </form>
                        @endif
                       
                      
                    </tr>
                        
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection