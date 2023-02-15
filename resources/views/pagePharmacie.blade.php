@extends('./../layouts/entetepharma')
@section('page-content')
<body>
  
<div class="position-relative">
    <img src="{{ asset('image/home.svg')}}" class="img-fluid mt-5 ms-5"  alt="..." style="height: 440px; width: 40%;">

    <div class="pos position-absolute top-0 start-60">
            <pre><span class="tit">  Bienvenue dans notre plateforme  <span class="text-bg-success p-1 m-1"> SEN Pharmacie</span></span>                      
              <span class="jeude text-success">Gaay Mou Gaaw te Nopale</span> 
  
  
              <span class="dec">Vous voulez vendre vos produit en toutes rapidité 
      et en toutes sécurité vous Etes au bon endroit
           avec SEN Pharmacie </span> 
             


      </pre>
    </div> 
</div>   
<hr>
<div class="live bg-success text-white"> 
  <marquee>
 <img src="{{ asset('image/livraison.png')}}" width="100" height="40" class="ms mt-1 mb-3 " fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
  <span class="v1 mt-1">Vender vos Médicaments et Produits au jour le jour  24h / 24  | 7j / 7 ou que vous soyer dans le Sénégal</span>  
  </marquee>
</div>
  <hr>
@endsection
</body>
</html>