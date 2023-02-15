
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
<header>
<style>


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
    height: 90vh;
}
</style>
<nav class="navbar  p-3 bg-success text-white">

  <div class="img-fluid" style="">
    <!-- Notifications -->
    <img src="{{ asset('image/log.png')}}"  alt="..." class="mt-2" style="margin-left:-12px; height: 130px; width:250px; color:white;">
  </div>
 
  <div class="bgput">
    <input class="putin" type="text" name="recherche" placeholder="   rechercher un médicament">
    <a href="#"><img class="icone" src="{{ asset('image/chercher.png')}}" width="25px;" alt="photo"></a>
  </div>
  <center>
  @include('partials.search');
  </center>
</nav>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light  shadow " style=" height:53px ;">
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
      <a class="navbar-brand" href="#"><span>SEN</span>PHARMACIE</a>
       <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-bs-target="#navbarSupportedContent" data-bs-toggle="collapse" type="button">
      <span class="navbar-toggler-icon"></span>
      </button>
      
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-3 mb-lg-0">
        <li class="nav-item">
          <a style="margin-left: 90px; text-transform: uppercase;" class="nav-link mt-2" href="{{route('pagePharmacie')}}">Accueil</a>
        </li>
         <li class="nav-item">
          <a style="text-transform: uppercase;" class="nav-link  mt-2" href="#">Produits</a></li>
        </li>
        
        <li class="nav-item">
          <a style="text-transform: uppercase;" class="nav-link  mt-2" href="{{ route('contactpharma') }}">Contact</a></li>
        </li>
        <li class="nav-item">
          <a style="text-transform: uppercase;" class="nav-link  mt-2" href="{{ route('apropospharma') }}">A propos</a></li>
        </li>
        @auth
        <li class="nav-item">
          <a style="text-transform: uppercase; color:rgb(7, 122, 7);" class="nav-link  mt-2" href="/adminGerant">MON ESPACE PHARMACIEN</a></li>
        </li>
        @endauth

       
      </ul>
      <!-- Left links -->
    </div>
    <!-- Collapsible wrapper -->

    
      
      <!-- Avatar -->

      @auth

      <div class="dropdown">

        <a href="#" style="text-decoration:none; color:black;" class=" dropdown-toggle ms-1" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
        <img
            src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp"
            class="rounded-circle"
            height="50"
            alt="Black and White Portrait of a Man"
            loading="lazy"
          style="margin-top: 9px;" />{{Auth::user()->name}}
       
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
        <li>
            <a  style="text-decoration:none;" class="dropdown-item" href="/users/{{Auth::user()}}/profile">Mon profile</a>
          </li>
          <li>
            <a  style="text-decoration:none;" class="dropdown-item" href="#">Settings</a>
          </li>
          <li>
            <a  style="text-decoration:none;" class="dropdown-item" href="{{route('logout')}}">Logout</a>
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
</header>
@include('layouts.footer' )












































