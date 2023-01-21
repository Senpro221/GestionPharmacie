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
				
				@if (session()->has('errors'))
					<div class="alert alert-danger">
						{{session()->get('error')}}
					</div>
				@endif

				@if (session()->has('error'))
				<div class="alert alert-danger">
					{{session()->get('error')}}
				</div>
				@endif

				<form action="/" method="POST" class="form-product">
					@method('post')
					@csrf  

				
		        	<div class="form-group">
		        		<label for="">Email</label>
		        		<input type="email"  class="form-control" name="email" placeholder="email de l'utilisateur" value="{{ old('email')}}">
		        		@error('email')
						<div class="text text-danger">
							{{$message}}
						</div>
						@enderror
		        	</div>

		        	<div class="form-group">
		        		<label for="">Mot de passe</label>
		        		<input type="password"  class="form-control" name="password" placeholder="Entrer votre mot de passe">
		        		@error('password')
						<div class="text text-danger mt-1">
							{{$message}}
						</div>
						@enderror
		        	</div>

						<button type="submit" class="btn btn-success">Se connecter</button> 
				</form>
				<p class="mt-1">Aucun compte ? <a href="{{route('registration')}}">Inscrivez vous</a></p>
			</div>
		</div>
	</div>
</div>
</div>
@endsection