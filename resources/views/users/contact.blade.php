
@extends('./../layouts/enteteclient')

@section('page-content')

<img src="{{ asset('image/home.svg')}}" class="img-fluid mt-4 ms-5" alt="..." style="height: 440px; width: 40%;">

<div class="pos position-absolute  start-60" style="margin-top: -370px;">
                                                             <pre>                           <span class="tite" style="font-size: 70px; ">  SEN PHARMACIE</span>
                                           <span class="jeude text-success" style="font-size: 50px;">Nous Contacter</span> 
                                    </pre>
  </div> 
</div>   
<hr>
<div class="live bg-success text-white"> 
  <marquee>
 <img src="{{ asset('image/livraison.png')}}" width="100" height="40" class="ms mt-1 mb-3 " fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
  <span class="v1 mt-1">Vous pouvez nous contacter sur la plateforme 24/24</span>  
  </marquee>
</div>
  <hr>
    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="h3 mb-5  mt-2 text-success">Entrer en contact avec nous</h2>
          </div>
          <div class="col-md-12">
    
            <form action="#" method="post">
    
              <div class="p-3 p-lg-5 border">
                <div class="form-group row">
                  <div class="col-md-6">
                    <label for="c_fname" class="text-black">Nom <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="c_fname" name="c_fname">
                  </div>
                  <div class="col-md-6">
                    <label for="c_lname" class="text-black">Prenom <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="c_lname" name="c_lname">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_email" class="text-black">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="c_email" name="c_email" placeholder="">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_subject" class="text-black">Sujet </label>
                    <input type="text" class="form-control" id="c_subject" name="c_subject">
                  </div>
                </div>
    
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_message" class="text-black">Message </label>
                    <textarea name="c_message" id="c_message" cols="30" rows="7" class="form-control"></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-lg-12">
                    <input type="submit" class="btn btn-success btn-lg btn-block mt-2" value="Envoyer le message">
                  </div>
                </div>
              </div>
            </form>
          </div>
          
        </div>
      </div>
    </div>


  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>
@endsection