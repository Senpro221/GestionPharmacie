
@extends('./layouts/appVendeur')


@section('page-content')

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css" />
    <!-- Boxicons CDN Link -->
    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  <body>
    
      <div class="home-content">
        <div class="overview-boxes">
          <div class="box">
            @if($request->session()->has('idPharmacie'))
				     @php $pharma =  session('idPharmacie');  
              $c=DB::table('commandes')->where('id_pharma',$pharma)->count();
         
              @endphp
            
            <div class="right-side">
              <div class="box-topic">Commande</div>
              <div class="number">{{ $c }}</div>
              <div class="indicator">
                <i class="bx bx-up-arrow-alt"></i>
                <span class="text">Depuis hier</span>
              </div>
            </div>
            <i class="bx bx-cart-alt cart"></i>
          </div> 
          @endif
          <div class="box">
            <div class="right-side">
              @php
                $user = DB::table('vendres')->count();
              @endphp
              <div class="box-topic">ventes</div>
              <div class="number">{{ $user }}</div>
              <div class="indicator">
                <i class="bx bx-down-arrow-alt down"></i>
                <span class="text">Vendue</span>
              </div>
            </div>
            <i class="bx bxs-cart-add cart two"></i>
          </div>
        </div>
          <div class="sales-boxes">
            <div class="recent-sales box">
              <div class="title">Ventes récentes</div>
              <div class="sales-details">
               
                <ul class="details">
                  <li class="topic">Date</li>
                  @foreach ($ventes as $com )
                  
                  <li><a href="#">{{ $com->DateAchat }}</a></li>
                  @endforeach
                </ul>
              
                <ul class="details">
                  <li class="topic">Médicaments</li>
                  @foreach ($ventes as $medoc)
                  <li><a href="#">{{ $medoc->nom }}</a></li>
                  @endforeach
                </ul>
                <ul class="details">
                  <li class="topic">Quantité vendue</li>
                  @foreach ($ventes as $com )
                  <li><a href="#">{{ $com->quantiteVendue }}</a></li>
                  @endforeach
                </ul>
                <ul class="details">
                  <li class="topic">Prix</li>
                  @foreach ($ventes as $medoc)
                  <li><a href="#"></a>{{ $medoc->prix_unitaire }}</li>
                  @endforeach
                 
                </ul>

              </div>
              <div class="button" >
                <a href="#" type="button" class="btn-success" >Voir Tout</a>
              </div>
            </div>
            {{-- <div class="top-sales box">
              --}}

        </div>
 

    <script>
      let sidebar = document.querySelector(".sidebar");
      let sidebarBtn = document.querySelector(".sidebarBtn");
      sidebarBtn.onclick = function () {
        sidebar.classList.toggle("active");
        if (sidebar.classList.contains("active")) {
          sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
        } else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
      };
    </script>
  </body>
</html>



  @endsection
