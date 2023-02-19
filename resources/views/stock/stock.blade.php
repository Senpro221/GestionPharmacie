
@extends('./layouts/app')


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
                    <th>Nom medicaments</th>
                    <th>Quantité en stock</th>
                    <th>Date actuelle</th>
                    <th>Date de péremption</th>
                    <th>Action</th>
                </tr>
                @foreach($stocks as $stock ) 
                    <tr>
                        <td>{{ $stock->nom }}</td>
                        @if ($stock->quantite <= $stock->quantiteMinim)
                        <td class="text-warning">{{ $stock->quantite }} minimum</td>
                        @else
                        <td>{{ $stock->quantite }}</td>
                        @endif

                        @php
                            $date = gmdate('Y-d-m')  
                        @endphp
                        <td>{{ $date }}</td>
                        @if ($date >= $stock->dlc)
                        <td class="text-danger">{{ $stock->dlc }}</td>
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