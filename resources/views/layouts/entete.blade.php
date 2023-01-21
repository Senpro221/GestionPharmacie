
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
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous" defer></script>
	
</head>
<body>
<div>
<nav class="navbar  p-3 bg-success text-white">

  <div class="img-fluid ">
    <!-- Notifications -->
    <img src="{{ asset('image/panier.png')}}"  alt="..." style="height: 50px; width:50px; color:white; align-items:center">
  </div>
<div>
  <input type="search" placeholder="Recherche....." class="cherche ms-5 p-2 mt-2">
  <a href="#" style="text-decoration: none; color:white;">
    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
      <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
    </svg>
  </a>
  
</div>


  <a href="#" class="seare">
    <center>
    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart ms-5 mt-2" viewBox="0 0 16 16">
      <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
      <span class="mnm position-absolute top-8 start-60 me-5 translate-middle badge rounded-pill bg-danger">
              4+
      </span>
    </svg>
    </center>
    <p class=" mt-1 ms-5">Votre panier</p>
</a>
  <a href="{{route('registration')}}" class="sear ">

    <center>
      <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle me-3 mt-2" viewBox="0 0 16 16">
        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
      </svg>
    </center>
    <p class="me-3 mt-1">Identifier Vous</p>
</a>
</nav>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light  shadow p-1 " style="">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
    <i class="fa fa-bars" aria-hidden="true"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Navbar brand -->
      @auth
      @endauth
      <a class="navbar-brand mt-2 mt-lg-0" href="#">
        <img
          src=""
          height="40"
          alt="SUNUPHARMACIE"
          loading="lazy"
        />
        
      </a>
      
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="/home">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('medicaments')}}">Médicaments</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Santé</a>
        </li>
        @auth
        <li class="nav-item">
          <a class="nav-link" href="{{route('logout')}}">Commandes</a>
        </li>
          
        @endauth
        <li class="nav-item">
          <a class="nav-link" href="#">Produits</a></li>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Blog</a></li>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">A propos</a></li>
        </li>
      </ul>
      <!-- Left links -->
    </div>
    <!-- Collapsible wrapper -->

    <!-- Right elements -->
    <div class="d-flex align-items-center">
      <!-- Icon -->
      <a class="text-reset me-3" href="#">
        <i class="fas fa-shopping-cart"></i>
      </a>

      
      <!-- Avatar -->

      @auth

      <div class="dropdown">

        <a href="#" class=" dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
        <img
            src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp"
            class="rounded-circle"
            height="40"
            alt="Black and White Portrait of a Man"
            loading="lazy"
          />
       
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
        <li>
            <a class="dropdown-item" href="/users/{{Auth::user()}}/profile">Mon profile</a>
          </li>
          <li>
            <a class="dropdown-item" href="#">Settings</a>
          </li>
          <li>
            <a class="dropdown-item" href="{{route('logout')}}">Logout</a>
          </li>
        </ul>
      @endauth
    <!-- Right elements -->
  </div>

  <!-- Container wrapper -->
</nav>
@yield('page-content')
<!-- Navbar -->
</div>













































