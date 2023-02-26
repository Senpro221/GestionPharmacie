
@extends('./layouts/appSuper')


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
                        <td>
                        <form action="#" method="POST">
                            @csrf
                            @method('delete')
                        <button type="submit" class="btn btn-danger">Supprimer</button></td> 
                        </form> 
                       @else
                        <td>{{ $stock->dlc }}</td>
                        @endif
                      
                    </tr>
                        
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection