@extends('./../layouts/enteteclient')

@section('page-content')
<body>
<div class="row">
	<div class="col-md-2" ></div>
	<div class="col-md-8 mt-1">
		<div class="card border border-success shadow p-3 mb-1 bg-white rounded ">

			<div class="card-body">
					<center><h4 class="text-success">Modifier votre profile!!!</h4></center> 
				<form action="{{route('registration')}}" method="POST" class="form-product">
					@method('post')
					@csrf 

					<div class="form-group">
						<label for="">Nom</label>
						<input type="text"  class="form-control mt-1" name="name"  value="{{$user->name}}">

		        	</div>

					<div class="form-group">
						<label for="">Prenom</label>
						<input type="text"  class="form-control mt-1" value="{{$user->prenom}}">
		        	</div>


		        	<div class="form-group">
		        		<label for="">Email</label>
		        		<input type="email"  class="form-control" name="email"  value="{{$user->email}}">
		        	</div>

					<div class="form-group">
		        		<label for="">Téléphone</label>
		        		<input type="number"  class="form-control" name="telephone" value="{{$user->telephone}}">
		        	</div>
					<div class="form-group">
		        		<label for="">Adresse</label>
		        		<input type="text"  class="form-control" name="adress"  value="{{$user->adress}}">
		        	</div>
		        	<div class="form-group">
		        		<label for="">Mot de passe</label>
		        		<input type="password"  class="form-control" name="password" value="{{$user->password}}">
		        	</div>

						<button type="submit" class="btn btn-success">Modifier</button> 
				</form>
				
			</div>
		</div>
	</div>
</div>
</body>
@endsection