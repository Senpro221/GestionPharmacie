 @extends('./../layouts/enteteGerant')
   

    <img class="img1" src="/image/pho.png" autoplay="autoplay" loop="loop">

@section('page-content')

    <div class="carousel slide" data-bs-ride="carousel" id="carouselExampleCaptions">
        <div class="carousel-indicators">
            <button aria-label="Slide 1" class="active" data-bs-slide-to="0" data-bs-target="#carouselExampleCaptions" type="button"></button> <button aria-label="Slide 2" data-bs-slide-to="1" data-bs-target="#carouselExampleCaptions" type="button"></button> <button aria-label="Slide 3" data-bs-slide-to="2" data-bs-target="#carouselExampleCaptions" type="button"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="carousel-caption">
                    <h5 class="animated fadeInDown" style="animation-delay: 1s">Bienvenu Dans notre plateforme</h5>
                    <p class="animated fadeInUp d-none d-md-block" style="animation-delay: 2s">L’humain et l’innovation
                   au service du bien-être
                   des pharmaciens.</p>
                    <p class="animated fadeInUp" style="animation-delay: 3s"><a class="a1" href="#">Appointment</a></p>
                </div>
            </div>
            <div class="carousel-item">
                <div class="carousel-caption">
                    <h5 class="animated fadeInDown" style="animation-delay: 1s">Modern Machineries</h5>
                    <p class="animated fadeInUp d-none d-md-block" style="animation-delay: 2s">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime tempore quis esse quidem fugiat cum.</p>
                    <p class="animated fadeInUp" style="animation-delay: 3s"><a href="#">Appointment</a></p>
                </div>
            </div>
            <div class="carousel-item">
                <div class="carousel-caption">
                    <h5 class="animated fadeInDown" style="animation-delay: 1s">24 / 7 Services</h5>
                    <p class="animated fadeInUp d-none d-md-block" style="animation-delay: 2s">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime tempore quis esse quidem fugiat cum.</p>
                    <p class="animated fadeInUp" style="animation-delay: 3s"><a class="a1" href="#">Appointment</a></p>
                </div>
            </div>
        </div><button class="carousel-control-prev" data-bs-slide="prev" data-bs-target="#carouselExampleCaptions" type="button"><span aria-hidden="true" class="carousel-control-prev-icon"></span> <span class="visually-hidden">Previous</span></button> <button class="carousel-control-next" data-bs-slide="next" data-bs-target="#carouselExampleCaptions" type="button"><span aria-hidden="true" class="carousel-control-next-icon"></span> <span class="visually-hidden">Next</span></button>
          
@endsection
   