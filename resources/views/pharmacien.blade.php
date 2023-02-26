@extends('./../layouts/entetepharma')
@section('page-content')
<body>
  
<div class="position-relative">
    <img src="{{ asset('image/home.svg')}}" class="img-fluid mt-5 ms-5"  alt="..." style="height: 440px; width: 40%;">

    <div class="pos position-absolute top-0 start-60">
                         <pre><span class="tit">             Bienvenue dans notre plateforme  <span class="text-bg-success p-1 m-1"> SEN Pharmacie</span></span>                      
                               <span class="jeude text-success">Jaay Mou Gaaw te Nopale</span> 
  
  
                     <span class="dedc" style="font-family: 'Times New Roman', Times, serif; font-weight: bold; font-size: 25px;">Vous voulez vendre vos produits en toute rapidité 
                               et en toute sécurité vous Etes au bonne endroit
                                              avec SEN Pharmacie </span> 
                                                    


      </pre>
    </div> 
</div> 
@foreach ($pharma as $pharma)
 
  <div class="class" style="position: relative">
    <a href="{{ route('accederPharmacie',$pharma->id) }}" class="btn btn-success" style="position: absolute; margin-left: 55rem; margin-top: -150px; font-family: 'Times New Roman', Times, serif; font-weight: bold; font-size: 25px;" >Accéder à votre espace admin</a>
</div>
  @break
@endforeach 
<hr>
<div class="live bg-success text-white"> 
  <marquee>
 <img src="{{ asset('image/livraison.png')}}" width="100" height="40" class="ms mt-1 mb-3 " fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
  <span class="v1 mt-1">Vender vos Médicaments et Produits au jour le jour  24h / 24  | 7j / 7 où que vous soyez dans le Sénégal</span>  
  </marquee>
</div>
  <hr>
@endsection
</body>
</html>