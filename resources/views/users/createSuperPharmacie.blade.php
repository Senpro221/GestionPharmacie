
@extends('./../layouts/app')


@section('page-content')

<div class="home-content ">
    @if (session()->has('success'))
             <div class="alert alert-success">
               {{session()->get('success')}}
             </div>
          @endif
     <div class="overview-boxes">
     
         <div class="box">
           <div style="width: 450px;">
           <form action="{{ route('creationSuperPharmacie') }}" method="POST">
            <h2 class="text-success">Ajouter Un Utitilisateur</h2>
            <hr>
           @csrf
           @method('post')
             <label for="nom_medoc">Nom </label>
             <input type="text" name="name" id="nom" placeholder=" Entre le Nom" value="{{ old('name')}}">

             @error('name')
           <div class="text text-danger">
             {{$message}}
           </div>
           @enderror
            <label for="nom_medoc">Prenom</label>
             <input type="text" name="prenom" id="prenom" placeholder="Entre le prenom" value="{{ old('prenom')}}">

             @error('prenom')
               <div class="text text-danger">
               {{$message}}
               </div>
             @enderror

             <label for="nom_medoc">Email</label>
             <input type="email" name="email" id="prenom" placeholder="Entre le prenom" value="{{ old('prenom')}}">

             @error('email')
               <div class="text text-danger">
               {{$message}}
               </div>
             @enderror
             
             <label for="dlc">Telephone</label>
             <input type="number" name="telephone" id="telephone" placeholder="Telephone" value="{{ old('telephone')}}">

             @error('telephone')
               <div class="text text-danger">
               {{$message}}
               </div>
             @enderror

             <label for="nom_medoc">Adresse</label>
             <input type="text" name="adress" id="adresse" placeholder="adresse" value="{{ old('adresse')}}">

             @error('adress')
               <div class="text text-danger">
               {{$message}}
               </div>
             @enderror

              <label for="password">Mot de passe</label>
             <input type="password" name="password" id="password" placeholder="Entre le password" >

             @error('password')
               <div class="text text-danger">
               {{$message}}
               </div>
             @enderror

             <label for="nom_medoc">Profil</label>
             <select name="role" id="adresse" >
               <option value="super">super</option>
             </select>
             @error('role')
               <div class="text text-danger">
               {{$message}}
               </div>
             @enderror

             <button type="submit" class="btn btn-success mt-1">Ajouter</button>
   
                <a href="{{ route('utilisateur') }}" class="btn btn-warning ms-3 mt-1">Retour</a>
            
           </form>
       </div>
 </div>
{{-- <div class="home-content ">
    
      
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
</div> --}}
@endsection