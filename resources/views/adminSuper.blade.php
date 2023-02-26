
@extends('./layouts/appSuper')


@section('page-content')

  <body>
    
      <div class="home-content">
        <div class="overview-boxes">
          <div class="box">
            <div class="right-side">
              @php
              $comm = DB::table('medicaments')->count();
            @endphp
              <div class="box-topic">Médicaments</div>
              <div class="number">{{ $comm }}</div>
              <div class="indicator">
                <i class="bx bx-up-arrow-alt"></i>
                <span class="text">Disponible</span>
              </div>
            </div>
            <i class="bx bx-cart-alt cart"></i>
          </div>
          
          
        
        </div>

        <div class="sales-boxes">
          <h1></h1>
          {{-- <div class="recent-sales box">
            <div class="title">Vente recentes</div>
            <div class="sales-details">
              <ul class="details">
                <li class="topic">Date</li>
                <li><a href="#">02 Jan 2021</a></li>
                <li><a href="#">02 Jan 2021</a></li>
                <li><a href="#">02 Jan 2021</a></li>
                <li><a href="#">02 Jan 2021</a></li>
                <li><a href="#">02 Jan 2021</a></li>
                <li><a href="#">02 Jan 2021</a></li>
                <li><a href="#">02 Jan 2021</a></li>
              </ul>
              <ul class="details">
                <li class="topic">Client</li>
                <li><a href="#">Abdoul Razak</a></li>
                <li><a href="#">Abdel Nasser</a></li>
                <li><a href="#">Maman Sani</a></li>
                <li><a href="#">Narouwa</a></li>
                <li><a href="#">Ishaka</a></li>
                <li><a href="#">Abdoullah</a></li>
                <li><a href="#">Adam</a></li>
                <li><a href="#">Komche</a></li>
                <li><a href="#">Adamou</a></li>
              </ul>
              <ul class="details">
                <li class="topic">Produit</li>
                <li><a href="#">Ordinateur</a></li>
                <li><a href="#">iPhone</a></li>
                <li><a href="#">Returned</a></li>
                <li><a href="#">Ordinateur</a></li>
                <li><a href="#">iPhone</a></li>
                <li><a href="#">Returned</a></li>
                <li><a href="#">Ordinateur</a></li>
                <li><a href="#">iPhone</a></li>
                <li><a href="#">Ordinateur</a></li>
              </ul>
              <ul class="details">
                <li class="topic">Prix</li>
                <li><a href="#">204.98 F</a></li>
                <li><a href="#">24.55 F</a></li>
                <li><a href="#">25.88 F</a></li>
                <li><a href="#">170.66 F</a></li>
                <li><a href="#">56.56 F</a></li>
                <li><a href="#">44.95 F</a></li>
                <li><a href="#">67.33 F</a></li>
                <li><a href="#">23.53 F</a></li>
                <li><a href="#">46.52 F</a></li>
              </ul>
            </div>
            <div class="button">
              <a href="#">Voir Tout</a>
            </div>
          </div>
          <div class="top-sales box">
            <div class="title">Produit le plus vendu</div>
            <ul class="top-sales-details">
              <li>
                <a href="#">
                  <!--<img src="images/sunglasses.jpg" alt="">-->
                  <span class="product">Ordinateur</span>
                </a>
                <span class="price">1107 F</span>
              </li>
              <li>
                <a href="#">
                  <!--<img src="images/jeans.jpg" alt="">-->
                  <span class="product">PC</span>
                </a>
                <span class="price">1567 F</span>
              </li>
              <li>
                <a href="#">
                  <!-- <img src="images/nike.jpg" alt="">-->
                  <span class="product">Chaussure</span>
                </a>
                <span class="price">1234 F</span>
              </li>
              <li>
                <a href="#">
                  <!--<img src="images/scarves.jpg" alt="">-->
                  <span class="product">Pantalon</span>
                </a>
                <span class="price">2312 F</span>
              </li>
              <li>
                <a href="#">
                  <!--<img src="images/blueBag.jpg" alt="">-->
                  <span class="product">Samsung</span>
                </a>
                <span class="price">1456 F</span>
              </li>
              <li>
                <a href="#">
                  <!--<img src="images/bag.jpg" alt="">-->
                  <span class="product">iPhone</span>
                </a>
                <span class="price">2345 F</span>
              </li>

              <li>
                <a href="#">
                  <!--<img src="images/addidas.jpg" alt="">-->
                  <span class="product">iPhone X</span>
                </a>
                <span class="price">2345 F</span>
              </li>
              <li>
                <a href="#">
                  <!--<img src="images/shirt.jpg" alt="">-->
                  <span class="product">TShirt</span>
                </a>
                <span class="price">1245 F</span>
              </li>
            </ul>
          </div> --}}
        </div>
      </div>
    </section>

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
