<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> page accueil</title>
  <link rel="stylesheet" href="{{asset('build/assets/app.css')}}">
	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous" defer></script>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css')}}">
    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  <body>
    <div class="sidebar">
      <div class="logo-details">
        <i class="bx bxl-c-plus-plus"></i>
        <span class="logo_name" style="margin: 0px; font-size:22px;">SENPHARMACIE</span>
      </div>
      <ul class="nav-links">
        <li>
          <a href="/admin" class="active" >
            <i class="bx bx-grid-alt"></i>
            <span class="links_name">Bienvenue {{Auth::user()->prenom}} </span>
          </a>
        </li>
        <li>
          <a href="{{ route('listePharmacie') }}">
            <i class="bx bx-pie-chart-alt-2"></i>
            <span class="links_name">Pharmacies</span>
          </a>
        </li>
       
        <li>
          <a href="{{route('allUser')}}">
            <i class="bx bx-user"></i>
            <span class="links_name">Utilisateur</span>
          </a>
        </li>
       
        <li class="log_out">
          <a href="{{route('logout')}}">
            <i class="bx bx-log-out"></i>
            <span class="links_name">Déconnexion</span>
          </a>
        </li>
      </ul>
    </div>
    <section class="home-section">
      <nav>
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"></i>
          <span class="dashboard ">Page administrateur</span>
        </div>
        <div class="search-box">
          <input type="text" placeholder="Recherche..." />
          <i class="bx bx-search"></i>
        </div>

        <div class="flex-shrink-0">
           @auth
           <a class="nav-link" href="#">
              <center>
                <img src="{{ asset('image/profile.png')}}"                  alt="Generic placeholder image" class="img-fluid rounded-circle border border-light border-3 me-2"
                  style="width: 50px;">
              </center>
                  {{Auth::user()->name}}</a>
                  @endauth
        </div>
        
       
      </nav>

     
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





@yield('page-content')

</body>
</html>