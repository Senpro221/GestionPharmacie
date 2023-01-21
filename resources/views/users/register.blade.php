@extends('./../layouts/entete')

@section('page-content')
<body>
<div class="row">
	<div class="col-md-2" ></div>
	<div class="col-md-8 mt-1">
		<div class="card border border-success shadow p-3 mb-1 bg-white rounded ">

			<div class="card-body">
					<center><h4 class="text-success">Incrivez vous pour Vendre des medicament </h4></center> 
				<form action="{{route('registration')}}" method="POST" class="form-product">
					@method('post')
					@csrf 

					<div class="form-group">
						<label for="">Nom de la pharmacie</label>
						<input type="text"  class="form-control mt-1" name="name" placeholder="Nom de l'utilisateur" value="{{ old('name')}}">

						@error('name')
						<div class="text text-danger">
							{{$message}}
						</div>
						@enderror
		        	</div>


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
		        		<label for="">Téléphone</label>
		        		<input type="number"  class="form-control" name="telephone" placeholder="numéro de telephone" value="{{ old('telephone')}}">
		        		@error('telephone')
						<div class="text text-danger">
							{{$message}}
						</div>
						@enderror
		        	</div>
					<div class="form-group">
		        		<label for="">Adresse</label>
		        		<input type="text"  class="form-control" name="adress" placeholder="numéro de telephone" value="{{ old('adress')}}">
		        		@error('adress')
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

						<button type="submit" class="btn btn-success">Inscription</button> 
				</form>
				<p>Déja un compte ? <a href="{{route('login')}}">connecter vous</a></p>
			</div>
		</div>
	</div>
</div>
</body>
@endsection