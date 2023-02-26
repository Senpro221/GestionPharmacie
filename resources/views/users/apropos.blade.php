
@extends('./../layouts/enteteclient')

@section('page-content')

<body>

  <div class="site-wrap">



    <div class="site-blocks-cover inner-page " style="width:100%;" >  
        <img src="{{ asset('image/Jauner.png')}}" alt="Image placeholder" class="mb-4" style="width:100%; height: 550px; ">
    </div>

    <div class="site-section bg-light custom-border-bottom" data-aos="fade">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-6">
            <div class="block-16">
              <figure>
                <img src="{{ asset('image/photo.jpg')}}" alt="Image placeholder" class="img-fluid rounded ">
                <a href="https://vimeo.com/channels/staffpicks/93951774" class="play-button popup-vimeo"><span
                    class="icon-play"></span></a>
    
              </figure>
            </div>
          </div>
          <div class="col-md-1"></div>
          <div class="col-md-5">
    
    
            <div class="site-section-heading pt-3 mb-4">
              <h2 class="text-black">QUELQUES MOTS POUR NOTRE PLATEFORME</h2>
            </div>
            <p>L’humain et l’innovation au service du bien-être des pharmaciens.</p>            </p>
            <p>L’accès à la plateforme SEN PHARMACIE est strictement réservé aux pharmaciens,aux clients et aux autres professionnels du médicament.
                Cet accès est gratuit. Il n’y a pas d’abonnement et pas de durée d’engagement. SEN PHARMACIE ne perçoit une commission que si, et uniquement si,
                 une vente est conclue sur la plateforme.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="site-section site-section-sm site-blocks-1 border-0" data-aos="fade">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
            <div class="icon mr-4 align-self-start">
              <span class="icon-truck text-primary"></span>
            </div>
            <div class="text">
              <h4 class="text-success">SEN PHARMACIE EN QUELQUES MOTS</h4>
              <p>SEN PHARMACIE est une plateforme de partage de médicaments entre toutes les pharmacies du sénégal.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
            <div class="icon mr-4 align-self-start">
              <span class="icon-refresh2 text-primary"></span>
            </div>
            <div class="text">
              <h2 class="text-success">SEN PHARMACIE</h2>
              <p> permet aux pharmaciens de mettre en vente leurs  médicaments.
                Son but est de diminuer le gaspillage des médicaments dans les pharmacies en réduisant le nombre des médicaments échus ou en surstock.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="200">
            <div class="icon mr-4 align-self-start">
              <span class="icon-help text-primary"></span>
            </div>
            <div class="text">
              <h2>La plateforme</h2>
              <p>Découvrez comment nous pouvons vous aider à distribuer des étiquettes de pharmacie, 
                à gérer l'approvisionnement et à soutenir la production pharmaceutique..</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    

    <div class="site-section bg-light custom-border-bottom" data-aos="fade">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 site-section-heading text-center pt-4">
            <h2>L'équipe</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-6 mb-5">
    
            <div class="block-38 text-center">
              <div class="block-38-img">
                <div class="block-38-header">
                  <img src="{{ asset('image/mad.jpeg')}}" alt="Image placeholder" class="mb-4" style="width:200px; height:200px; clip-path:ellipse(50% 50%); ">
                  <h3 class="block-38-heading h4">Hawa Thioube</h3>
                  <p class="block-38-subheading">Développeur</p>
                </div>
                <div class="block-38-body">
                  <p>... </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-6 mb-5">
            <div class="block-38 text-center">
              <div class="block-38-img">
                <div class="block-38-header">
                    <img src="{{ asset('image/moi.png')}}" alt="Image placeholder" class="mb-4" style="width:200px; height:200px; clip-path:ellipse(50% 50%); ">
                    <h3 class="block-38-heading h4">Ibra Diouf</h3>
                  <p class="block-38-subheading">Développeur</p>
                </div>
                <div class="block-38-body">
                  <p>...</p>
                </div>
              </div>
            </div>
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