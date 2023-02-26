<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{asset('build/assets/form.css')}}">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/form.css')}}">
    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
    <title>signin-signup</title>
</head>

<body>
    <div class="container">
        @if (session()->has('success'))
        <div class="alert alert-success">
            {{session()->get('success')}}
        </div>
        @endif
        <div class="signin-signup" >
            
            <form action="{{ route('Connexionlogin') }}" class="sign-in-form" method="POST" >
                
                    @csrf
                    @method('post')
                    @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{session()->get('error')}}
                    </div>
                @endif

                <h2 class="title">Connexion</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="email"  name="email" placeholder="email de l'utilisateur" value="{{ old('email')}}">

                </div>     
                        @error('email')
                        <div class="text text-danger">
                            {{$message}}
                        </div>
                        @enderror

                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="Entrer votre mot de passe">
                
                </div>

                 @error('password')
                        <div class="text text-danger mt-1">
                            {{$message}}
                        </div>
                    @enderror


                <input type="submit" value="Login" class="btn">
                <p class="social-text fs-5">Vous n'êtes pas pharmacien ? <a href="{{ route('registration') }}" class="text-success fs-5" style="text-decoration: none;">Cliquez ici !</a></p>
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
                 <p class="account-text">Vous n’avez pas de compte ? <a href="{{route('ajoutInscription')}}" id="sign-up-btn2">S’</a></p> 
            </form>
            <!-- registre -->
            <form action="{{ route('ajoutInscription') }}" class="sign-up-form" method="POST">
                
                <h2 class="title">S’inscrire</h2>

                <div class="input-field">
                    @method('post')
                    @csrf 
                    <i class="fas fa-user"></i>
                    <input type="text" name="name" placeholder="Entrer votre nom" value="{{ old('name')}}">

                    @error('name')
                        <div class="text text-danger">
                            {{$message}}
                        </div>
                        @enderror

                </div>

                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" name="prenom" placeholder="Votre prenom" value="{{ old('prenom')}}">

                    @error('prenom')
                        <div class="text text-danger">
                            {{$message}}
                        </div>
                        @enderror

                </div>

                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" placeholder="Email" value="{{ old('email')}}">

                    @error('email')
                        <div class="text text-danger">
                            {{$message}}
                        </div>
                        @enderror

                </div>

                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="text" name="adress" placeholder="Adresse" value="{{ old('adress')}}">

                    @error('adress')
                        <div class="text text-danger">
                            {{$message}}
                        </div>
                        @enderror

                </div>

                
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="Password">

                    @error('password')
                        <div class="text text-danger mt-1">
                            {{$message}}
                        </div>
                        @enderror

                </div>

                <div class="input-field">
                    @method('post')
                    @csrf 
                    <i class="fas fa-user"></i>
                    <input type="text" name="nom" placeholder="nom de la pharmacie" value="{{ old('nom')}}">

                    @error('nom')
                        <div class="text text-danger">
                            {{$message}}
                        </div>
                        @enderror

                </div>

                <div class="input-field">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    <input type="text" name="adresse" placeholder="Adresse de la pharmacie" value="{{ old('adresse')}}">

                    @error('adresse')
                        <div class="text text-danger">
                            {{$message}}
                        </div>
                        @enderror

                </div>

                <div class="input-field">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    <input type="text" name="ville" placeholder="ville" value="{{ old('ville')}}">

                    @error('ville')
                        <div class="text text-danger">
                            {{$message}}
                        </div>
                        @enderror

                </div>

                <div class="input-field">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    <input type="text" name="quartier" placeholder="quartier" value="{{ old('quartier')}}">

                    @error('quartier')
                        <div class="text text-danger">
                            {{$message}}
                        </div>
                        @enderror

                </div>

                <div class="input-field">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <input type="number" name="telephone" placeholder="Numéro de téléphone" value="{{ old('telephone')}}">

                    @error('telephone')
                        <div class="text text-danger">
                            {{$message}}
                        </div>
                        @enderror

                </div>

               

                <input type="submit" value="S’inscrire" class="btn">
                
             
               <p class="account-text">Vous avez déjà un compte ? <a href="{{route('login')}}" id="sign-in-btn2">Connexion</a></p>
            </form>
        </div>
        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Connectez-vous à votre espace personnel</h3>
                    <p>Connectez-vous pour Vendre vos médicaments et produits..</p>
                    <button class="btn" id="sign-in-btn">Connexion</button>
                </div>
                <img src="{{ asset('image/photo.jpg')}}" alt="" class="image" style="width: 100%;">
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>Vous n'avez pas de compte ?</h3>
                    <p>Incrivez vous pour Vendre vos médicaments et produits.
                    </p>
                    <button class="btn" id="sign-up-btn">S'inscrire</button>
                </div>
                <img src="{{ asset('image/photo.jpg')}}" alt="" class="image" style="width: 100%;">
            </div>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>