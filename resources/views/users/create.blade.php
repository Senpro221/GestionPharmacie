
@extends('./../layouts/app')


@section('page-content')


<div class="home-content ">
    
      
    <div class="container ">
        <div class="d-flex justify-content-between py-3">
            <div class="h4">Ajouter des Utilisateurs</div>
            <div>
                <a href="{{ route('utilisateur') }}" class="btn btn-primary">Back</a>
            </div>
        </div>

        <form action="{{ route('creation') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="card border-0 shadow-lg box">
                <div class="card-body">
                    <div class="mb-3 col-6">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="nom" placeholder="Enter Name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                        @error('nom')
                            <p class="invalid-feedback">{{ $message }}</p>    
                        @enderror                        
                    </div>
                    <div class="mb-3 col-6">
                        <label  class="form-label">prenom</label>
                        <input type="text" name="prenom"  placeholder="Enter Name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                        @error('prenom')
                            <p class="invalid-feedback">{{ $message }}</p>    
                        @enderror                        
                    </div>

                    <div class="mb-3 col-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" placeholder="Enter Email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                        @error('email')
                            <p class="invalid-feedback">{{ $message }}</p>    
                        @enderror      
                    </div>
                    <div class="mb-3 col-6" >
                        <label  class="form-label">Téléphone</label>
                        <input type="number" name="telephone" placeholder="Enter Name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                        @error('telephone')
                            <p class="invalid-feedback">{{ $message }}</p>    
                        @enderror                        
                    </div>

                    
                    <div class="mb-3 col-6">
                        <label for="address" class="form-label">Address</label>
                        <input name="adress" id="adress"  placeholder="Enter Address" class="form-control" value="{{ old('address') }}">
                    </div>
                    <div class="col-md-4">
                        <label for="inputState" class="form-label">Status</label>
                        <select id="inputState" name="role" class="form-select">
                        <option selected>vendeur</option>
                        <option value="vendeur">vendeur</option>
                        <option value="admin">admin</option>
                        </select>
                    </div>
                    <div class="mb-3 col-6">
                        <label for="password" class="form-label"></label>
                        <input type="password" name="password" placeholder="votre mot de passe">

                           
                    </div>
                
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Save Employee</button>

        </form>
        
   <div class="home-content ">
</div>
@endsection