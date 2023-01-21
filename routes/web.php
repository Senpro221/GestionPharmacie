<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\medicamentControler;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MonController;
use App\Http\Controllers\PharmacieController;
/*
|-------+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*-------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('dashboard');
// });

Route::get('/',[medicamentControler::class, 'index']);

//=================================accueil visiteure====================================//
Route::get('/visiteure',[medicamentControler::class,'indexVisiteur'])->name('visiteur');


//=================================//lister par categorie=================================//
Route::get('/trie' , [medicamentControler::class, 'trie'])->name('listing');
Route::get('/triedigest', [medicamentControler::class, 'triedigest'])->name('digestion');

//===============================lister les pharmacies
Route::get('/listePharmacie', [PharmacieController::class,'listePharma'])->name('listePharmacie');

//==========================middelware regroupant les route qui non pas besoing de Auth..==========// 
Route::middleware(['guest'])->group(function(){

//==================================page d'accueil de l'utilisateur====================================================// Route::get('home',[medicamentControler::class, 'accueil']);

// Route::get('/commande', [medicamentControler::class,'commande']);


//========================================enregistre un utilisateur===============================//     
    Route::get('/register', [UserController::class, 'register'])->name('registration');
    Route::post('/register', [UserController::class, 'handleRegistration'])->name('registration');

//==========================connecter un utilisateur==========================================//
    Route::get('/login',[UserController::class, 'login'])->name('login');

    Route::post('/login',[UserController::class,'handleLogin'])->name('login');


});


//================================middleware d'authentification==========================================//
Route::middleware('auth')->group(function(){

//===================================page d'accueil de l'admin=============================//
    Route::get('/admin',[medicamentControler::class,'admin']);
    Route::get('/min',[medicamentControler::class, 'indexe']);
//===================================Les Routes preceder par le /medicament========================================//   
  Route::prefix('medicaments')->group(function(){
//===================================ajouter des medicament=======================================================//

        Route::post('/',[medicamentControler::class, 'store']);
   
//====================================lister les medicament=====================================================//
        Route::get('/', [medicamentControler::class, 'lister'])->name('medicaments')->withoutMiddleware('auth');

//================================lister pour commander===========================================================//
        Route::get('/{medicament}', [medicamentControler::class, 'show'])->name('medicaments.show')->withoutMiddleware('auth');

//==================================editer un medicament=========================================================//
        Route::get('/medicaments/{medicament}/edit',[medicamentControler::class,'edit'])->name('medicaments.edit');
        Route::put('/medicaments/{medicament}/update',[medicamentControler::class,'update'])->name('medicaments.update');
     
//==========================================supprimer un medicament=====================================//
        Route::delete('/medicaments/{medicament}/delete',[medicamentControler::class,'delete'])->name('medicaments.delete');
   


    });

        // //================================client====================================================//
        // Route::get('/panier',[medicamentControler::class,'panier'])->name('panier');
        // Route::post('/panier',[medicamentControler::class,'panierhelde'])->name('panier');

//=================================disconnect=========================================================//
         Route::get('/logout', [UserController::class, 'logout'])->name('logout');

//=======================================lister les utilisateur=======================================//
         Route::get('/listeUser',[UserController::class, 'listeUser' ])->name('utilisateur');

 //===================================edit un user======================================//
        Route::get('/users/{user}/edit',[UserController::class,'edit']);

        Route::put('/users/{user}/update',[UserController::class,'update'])->name('users.update');

//================================supprimer un user====================================/      
        Route::delete('/users/{user}/delete',[UserController::class,'delete'])->name('delete');;

//==============================editer le profile===============================//
        Route::get('/profile',[UserController::class,'editprofile'])->name('profile');

        Route::put('/updateprofile',[UserController::class,'profileupdate'])->name('profileupdate');

        Route::get('/users/{user}/profile',[UserController::class,'editprofile']);

        Route::put('/users/{user}/update',[UserController::class,'profileupdate']);

//=================================Ajouter un utilisateur===============================
        Route::get('/create', [UserController::class, 'create'])->name('creation');
        Route::post('/create', [UserController::class, 'handlecreate'])->name('creation');
});



Route::get('/macie', [MonController::class,'dashboard->'])->name('senpharma');



//=============================/route pour ajouter un pharmacie==================================//
        
Route::get('/choisirConnexion', [PharmacieController::class,'choice'])->name('choisirConnexion');
Route::get('/ajoutPharmacie', [PharmacieController::class,'inscription'])->name('ajoutPharmacie');
Route::post('/ajoutInscriprion', [PharmacieController::class, 'handleInscription'])->name('ajoutInscription');

Route::get('/Connexionlogin',[PharmacieController::class, 'Connexionlogin'])->name('Connexionlogin');

Route::post('/Acceslogin',[PharmacieController::class,'handleAccesLogin'])->name('Connexionlogin');

 Route::get('/statut/{id}',[PharmacieController::class,'statut'])->name('statut');