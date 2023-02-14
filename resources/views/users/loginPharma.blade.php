@extends('./../layouts/entete')

@section('page-content')
 <div class="overview-boxes ">
<div class="row">
	<div class="col-md-4 "></div>
	<div class="col-md-4" style=" margin-top:20px; ">
		<div class="card overview-boxes  shadow p-5 mb-5 bg-white rounded">
			<div class="border-success "><center><h1 class="text-success mt-1">Connecter vous</h2></center></div>
				<hr>
			<div class="card-body">
				@if (session()->has('error'))
				<div class="alert alert-danger">
					{{session()->get('error')}}
				</div>
				@endif

				<form action="{{ route('test') }}" method="POST" class="form-product">
					<h2 class="title">Enregistrer</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text"  name="nom" placeholder="nom de la pharmacie" value="{{ old('nom')}}">

                    @error('nom')
                    <div class="text text-danger">
                        {{$message}}
                    </div>
                    @enderror

                </div> 


                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text"  name="adresse" placeholder="adresse de la pharmacie" value="{{ old('adresse')}}">

                </div>     
                        @error('adresse')
                        <div class="text text-danger">
                            {{$message}}
                        </div>
                        @enderror

                 <div class="input-field">
                     <i class="fas fa-user"></i>
                    <input type="text"  name="ville" placeholder="ville de la pharmacie" value="{{ old('ville')}}">
        
                 </div>     
                     @error('ville')
                        <div class="text text-danger">
                          {{$message}}
                    </div>
                    @enderror
        

                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text"  name="rue" placeholder="rue de la pharmacie" value="{{ old('rue')}}">
        
                    </div> 

                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="telephone" name="telephone" placeholder="Entrer le numero de telephone">
                
                </div>

                 @error('telephone')
                        <div class="text text-danger mt-1">
                            {{$message}}
                        </div>
                    @enderror


                <input type="submit" value="Login" class="btn">
                <p class="social-text">Ou connectez-vous avec la plateforme sociale</p>
                <div class="social-media">
                    <a href="#" class="social-icon">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="" class="social-icon">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="" class="social-icon">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="" class="social-icon">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
                 <p class="account-text">Vous n’avez pas de compte ? <a href="{{route('ajoutInscription')}}" id="sign-up-btn2">S’inscrire</a></p> 
           </form>
				<p class="mt-1">Aucun compte ? <a href="{{route('registration')}}">Inscrivez vous</a></p>
			</div>
		</div>
	</div>
</div>
</div>
@endsection