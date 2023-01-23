<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\medicamentControler;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\MonController;
use App\Http\Controllers\Connexion;
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
Route::get('/listePharmacie', [UserController::class,'listePharma'])->name('listePharmacie');
Route::get('/listePharmaciecl', [UserController::class,'listePharmacl'])->name('listePharmacie');

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
 if(Auth::user()->role === 'admin'){
        Route::get('/admin',[medicamentControler::class,'admin']);
        Route::get('/min',[medicamentControler::class, 'indexe']);
     }else{
       
     }
        
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

    //commander un medicament//
    Route::get('/commander',[Connexion::class,'order'])->name('commande');

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

Route::get('/connexion',[Connexion::class,'connexion']);

//=============================/route pour ajouter un pharmacie==================================//
        
Route::get('/choisirConnexion', [PharmacieController::class,'choice'])->name('choisirConnexion');
Route::get('/ajoutPharmacie', [UserController::class,'inscription'])->name('ajoutPharmacie');
Route::post('/ajoutInscriprion', [UserController::class, 'handleInscription'])->name('ajoutInscription');

Route::get('/Connexionlogin',[UserController::class, 'Connexionlogin'])->name('Connexionlogin');

Route::post('/Acceslogin',[UserController::class,'handleAccesLogin'])->name('Connexionlogin');
Route::get('/statut/{id}',[UserController::class,'statut'])->name('statut');

Route::get('dashboard',function(){
        return 'je suis connecter';
});

Route::get('/medoc{medicament}',[MonController::class,'show'])->name('medicaments.show');
Route::get('/basket',[BasketController::class,'show'])->name('basket.show');
Route::post('basket/add/{medicament}', [BasketController::class,'add'])->name('basket.add');
//Route::get('basket', [BasketController::class,'show'])->name('basket.show');
Route::get('basket/remove/{medicament}', [BasketController::class,'remove'])->name('basket.remove');
Route::get('basket/empty', [BasketController::class,'empty'])->name('basket.empty');

 Route::get('dashboad',[Connexion::class,'dashboad']);

//route pour aller dans trimedoc
Route::get('/trimedoc',[Connexion::class,'trimedoc']);