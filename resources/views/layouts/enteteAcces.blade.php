
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
<!-- JavaScript Bundle with Popper -->
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous" defer></script>

</head>
<body>
<style>

.img1{
    position: absolute;
    top: 60%;
    left: 50%;
    min-width: 100%;
    min-height: 80%;
    width: 60%;
    height: 50px;
    z-index: 0;
    transform: translateX(-50%) translateY(-50%);
}

.carousel-item {
    height: 100vh;
    min-height: 300px;
}
.carousel-caption {
    bottom: 220px;
    z-index: 2;
}
.carousel-caption h5 {
    font-size: 45px;
    text-transform: uppercase;
    letter-spacing: 2px;
    margin-top: 25px;
}
.carousel-caption p {
    width: 60%;
    margin: auto;
    font-size: 18px;
    line-height: 1.8;
}
.carousel-caption a {
    text-transform: uppercase;
    text-decoration: none;
    background: green;
    padding: 5px 20px;
    display: inline-block;
    color: #fff;
    margin-top: 15px;
    border-radius: 5px;
}

.carousel-inner:before {
    content: '';
    position: absolute;
    width: 100%;
    height: 82%;
    top: 2px;
    left: 0;
    background: rgba(0, 0, 0, 0.6);
    z-index: 1;
}
.navbar-light .navbar-brand {
    color: #000;
    margin-right:-4px;
    font-size: 35px;
    text-transform: uppercase;
    font-weight: bold;
    letter-spacing: 2px;
   
}
.navbar-light .navbar-brand span {
    color: green;
    padding:left;
}
.w-100 {
    height:90vh;
}
</style>
<div>
<nav class="navbar  p-3 bg-success text-white">
  <div class="img-fluid ">
   
  </div>
<div>
  <input type="search" placeholder="Recherche....." class="cherche ms-5 p-2 mt-2">
  <a href="#" style="text-decoration: none; color:white;">
    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
      <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
    </svg>
  </a>
  
</div>
 
</nav>


<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light  shadow " style=" height:50px ;">
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
      <a class="navbar-brand" href="#"><span class="mt-2">SEN</span>PHARMACIE</a>
       <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-bs-target="#navbarSupportedContent" data-bs-toggle="collapse" type="button">
      <span class="navbar-toggler-icon"></span>
      </button>
      
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link mt-2" style="margin-left: 120px; text-transform: uppercase;" href="/">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link mt-2" href="#" style="text-transform: uppercase;">Service</a></li>
        </li>
        <li class="nav-item">
          <a class="nav-link mt-2" href="#" style="text-transform: uppercase;">Blog</a></li>
        </li>
        <li class="nav-item">
          <a class="nav-link mt-2" href="#" style="text-transform: uppercase;">Contact</a></li>
        </li>
        <li class="nav-item">
          <a class="nav-link mt-2" href="#" style="text-transform: uppercase;">A propos</a></li>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="/min" style="text-transform: uppercase; ">Acceder a votre page admin</a>
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
            height="50"
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













































