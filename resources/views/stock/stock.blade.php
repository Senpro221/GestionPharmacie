
@extends('./layouts/app')


@section('page-content')
<div class="home-content" style="margin-left: 15rem;">
    <div class="overview-boxes ms-5 mt-2">
        <div class="box">
            <table class="mtable" border="1">
                <tr>
                    <th>Nom medicaments</th>
                    <th>Quantité en stock</th>
                    <th>Date actuelle</th>
                    <th>Date de péremtion</th>
                </tr>
                @foreach($stocks as $stock ) 
                    <tr>
                        <td>{{ $stock->nom }}</td>
                        <td style="text-align: center">{{ $stock->quantite }}</td>
                        @php
                            $date = date('y-m-d h:i:s');
                            
                        @endphp
                        <td>{{ $date }}</td>
                        @if ($date > $stock->dlc)
                        <td class="text-danger">{{ $stock->dlc }}</td>
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