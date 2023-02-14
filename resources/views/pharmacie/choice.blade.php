@extends('./../layouts/enteteclient')
@section('page-content')


<div class="home-content" style="margin-top:100px; margin-left:350px;">
   
  <div class="overview-boxes">
      <div class="box">
         <div style="float: left" >
             <h1>S'inscrire  en tant que</h1>
          </div> 
        
          <div style="float: left">
            <a class="btn btn-outline-success ms-3"  href="{{ route('registration') }}">Client</a>
            <span class="ms-3 mt-2" style="font-size: 2rem; "> ou</span>
        
            <a class="btn btn-outline-success ms-3" href="{{ route('ajoutPharmacie') }}">Pharmacien</a>
          </div>
    
        </div>
  </div>
</div>




  @endsection