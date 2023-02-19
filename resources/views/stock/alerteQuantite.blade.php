
@extends('./layouts/app')


@section('page-content')
<div class="home-content" style="margin-left: 15rem;">
    <div class="overview-boxes ms-5 mt-2">
        <div class="box">
            <table class="mtable" border="1">
                <tr>
                    <th class="alert alert-danger" role="alert">Alert pour la quantité seuil des medicaments</th>
                    
                </tr>
                @foreach($stocks as $stock ) 
                    <tr>
                        {{-- <td>{{ $stock->nom }}</td> --}}
                        @if ($stock->quantite <= $stock->quantiteMinim)
                        <td class="text-dark"><span class="text-dark">{{ $stock->nom }}     ==>    </span> <span class="text-bg-danger p-2"> {{ $stock->quantite }}</span>  <span class="text-dark">Ce médicament a atteint sa quantité seuil </span></td>
                        @else
                       
                        @endif

                    </tr>
                        
                @endforeach
            </table>
        </div>
    </div>

    <div class="overview-boxes ms-5 mt-2">
        <div class="box">
            <table class="mtable" border="1">
                <tr>
                    <th class="alert alert-danger" role="alert">Alert pour la Date de péremption des medicaments</th>
                    
                </tr>
                @foreach($stocks as $stock ) 
                    <tr>
                        
                        @php
                            $date = gmdate('Y-d-m')  
                        @endphp
                        
                        @if ($date >= $stock->dlc)
                        <td>{{ $stock->nom }} <span class="text-danger"> a atteint sa date de péremption</span></td>
                        
                       @else
                        @endif

                    </tr>
                        
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection