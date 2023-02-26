<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\medicamentControler;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\MonController;
use App\Http\Controllers\Connexion;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomController;
use App\Http\Controllers\PharmacieController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\Appartenir;
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
 Route::get('/',[medicamentControler::class, 'index']);

//=================================accueil visiteure====================================//
 //======================route apropos ,contacte=============//
                
        Route::get('/contact', [UserController::class,'contact'])->name('contact');
        Route::get('/apropos', [UserController::class,'apropos'])->name('apropos'); 
        Route::get('/visiteure',[medicamentControler::class,'indexVisiteur'])->name('visiteur');
 //=================================//lister par categorie=================================//
         Route::get('/triedouleurs' , [medicamentControler::class, 'trieDouleurFievre'])->name('DouleurFievre');
        Route::get('/triedigest', [medicamentControler::class, 'triedigest'])->name('digestion');
        Route::get('/dematologie', [medicamentControler::class, 'dematologie'])->name('dematologie');
        Route::get('/Homéopathie', [medicamentControler::class, 'Homéopathie'])->name('Homéopathie');
        Route::get('/Détente-Sommeil', [medicamentControler::class, 'DetenteSommeil'])->name('Détente-Sommeil');
        Route::get('/bucco-dentaires', [medicamentControler::class, 'dentaires'])->name('bucco-dentaires');
        Route::get('/VitaminesMineraux', [medicamentControler::class, 'VitaminesMineraux'])->name('VitaminesMineraux');
        Route::get('/CirculationVeineuse', [medicamentControler::class, 'CirculationVeineuse'])->name('CirculationVeineuse');

 //===============================lister compte pharmacies=========================================
        Route::get('/listePharmacie', [UserController::class,'listePharma'])->name('listePharmacie');
//==========================middelware regroupant les route qui non pas besoing de Auth..==========// 
 Route::middleware(['guest'])->group(function(){

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
        Route::get('/min',[medicamentControler::class, 'indexe'])->name('medocs');

//===================================Les Routes preceder par le /medicament========================================//   
        Route::prefix('medicaments')->group(function(){
//===================================ajouter des medicament=======================================================//

                Route::post('/',[medicamentControler::class, 'store']);
        
        //====================================lister les medicament=====================================================//
                Route::get('/', [medicamentControler::class, 'lister'])->name('medicaments')->withoutMiddleware('auth');

        //================================lister pour commander===========================================================//
                Route::get('/{medicament}', [medicamentControler::class, 'show'])->name('medicaments.show')->withoutMiddleware('auth');

        //==================================editer un medicament=========================================================//
                Route::get('/{medicament}/edit',[medicamentControler::class,'edit'])->name('medicaments.edit');
                Route::put('/{medicament}/update',[medicamentControler::class,'update'])->name('medicaments.updatemedoc');
        //==========================================supprimer un medicament=====================================//
                Route::delete('/{medicament}/delete',[medicamentControler::class,'delete'])->name('medicaments.delete');
    });

        //===============================commander un medicament===========================================//
        Route::get('/commander',[Connexion::class,'order'])->name('commande');
        Route::post('/detailleComme',[Connexion::class,'detailleComme'])->name('detailleComme');
        Route::get('/listerCommandes',[Connexion::class,'listerCommandes'])->name('listerCommandes');
        Route::get('/DetailsCommandes/{id}',[Connexion::class,'DetailsCommandes'])->name('DetailsCommandes');

        Route::get('/listesCommandesAll',[Connexion::class,'listesCommandesAll'])->name('listesCommandesAll');
       
        Route::get('/statutCommande/{id}',[Connexion::class,'statutCommande'])->name('statutCommande');
        Route::get('/CommandeLivrer/{id}',[Connexion::class,'CommandeLivrer'])->name('CommandeLivrer');

//========================================enregistre un vendeuree===============================//     
        Route::get('/userregister', [HomController::class, 'create'])->name('createUser');
        Route::post('/userregister', [HomController::class, 'handlecreate'])->name('createUser');
       
        Route::get('/adminSuper',[HomController::class,'adminSuper']);
        Route::get('/createSuperPharmacie', [HomController::class, 'createSuperPharmacie'])->name('createSuperPharmacie');
        Route::post('/creationSuperPharmacie', [HomController::class, 'creationSuperPharmacie'])->name('creationSuperPharmacie');

//==========================page admin du pharmacien un utilisateur==========================================//
        Route::get('/adminGerant',[HomController::class, 'index'])->name('adminGerant');
 //======================route apropos ,contacte danspharmacue controleurs=============//
        Route::get('/listeMedicament', [PharmacieController::class,'listeMedicament'])->name('listeMedicament');        
        Route::get('/contactpharma', [PharmacieController::class,'contact'])->name('contactpharma');
        Route::get('/apropospharma', [PharmacieController::class,'apropos'])->name('apropospharma'); 
//=================================liste des pharmacie============================================================//       
        Route::get('/pagePharmacie', [PharmacieController::class,'pagePharmacie'])->name('pagePharmacie'); 
        Route::get('/listePharmaciecl', [PharmacieController::class,'listePharmacl'])->name('listePharmaciecl');
        Route::get('/choisirPharmacie/{id}',[PharmacieController::class,'choisirPharmacie'])->name('choisirPharmacie');
        
        Route::get('/listerProduitPharma',[PharmacieController::class,'listerProduitPharma'])->name('listerProduitPharma');

        Route::get('/maPharmacie', [PharmacieController::class,'maPharmacie'])->name('maPharmacie'); 

        Route::get('/pharmacies/{pharmacie}/edit',[PharmacieController::class,'editPharmacie'])->name('editPharmacie');
        Route::put('/pharmacies/{pharmacie}/update',[PharmacieController::class,'updatePharmacie'])->name('updatePharmacie');

        //==========================edit,update.delete d'un vendeur
        Route::get('/accederPharmacie/{id}',[HomController::class,'accederPharmacie'])->name('accederPharmacie');
        Route::get('/users/{user}/editVendeur',[HomController::class,'edit'])->name('users.edit');
        Route::put('/users/{user}/updateVendeur',[HomController::class,'update'])->name('vendeur.update');
//================================supprimer un vendeur====================================/      
        Route::delete('/users/{user}/deleteVendeur',[HomController::class,'delete'])->name('delete');;

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
        //==========================lister l'ensemble des usersr===========================//
        Route::get('/allUser',[UserController::class,'allUser'])->name('allUser');
        
//=================================Ajouter un utilisateur===============================
        Route::get('/create', [UserController::class, 'create'])->name('creation');
        Route::post('/create', [UserController::class, 'handlecreate'])->name('creation');
});
//==============================dasboard================================

        Route::get('/macie', [MonController::class,'dashboard'])->name('senpharma');

        Route::get('/connexion',[Connexion::class,'connexion']);

//=============================/route pour ajouter un pharmacie==================================//
       Route::get('/ajoutPharmacie', [UserController::class,'inscription'])->name('ajoutPharmacie');
        Route::post('/ajoutInscriprion', [UserController::class, 'handleInscription'])->name('ajoutInscription');

        Route::get('/Connexionlogin',[UserController::class, 'Connexionlogin'])->name('Connexionlogin');


        Route::post('/Acceslogin',[UserController::class,'handleAccesLogin'])->name('Connexionlogin');
        Route::get('/statut/{id}',[UserController::class,'statut'])->name('statut');

        Route::get('dashboard',function(){
        return 'je suis connecter';
 
});

//=======================route ajout panier=================================
        Route::get('/medoc{medicament}',[BasketController::class,'shows'])->name('medicaments.show');
        Route::post('basket/add/{medicament}', [BasketController::class,'add'])->name('basket.add')->Middleware('auth');
        Route::get('/basketlispane',[BasketController::class,'show'])->name('basket.listpan');
    
        //=================================route des ordonances====================
        Route::get('/ajoutOrdonnance',[BasketController::class,'ajoutOrdonnance']);
        Route::post('/choisirordonance/{medicament}', [PharmacieController::class,'alertMedoc'])->name('alertMedoc');

        //===================================update quantite=========================================
//==================================editer un appartenir=========================================================//
        Route::get('/appartenirs/{appartenire}/edit',[Connexion::class,'editquantite'])->name('appartenires.edit');
        Route::put('/appartenirs/{id}/update',[Connexion::class,'update'])->name('appartenires.update');
        Route::get('/appartenirs/{id}/delete',[Connexion::class,'delete'])->name('appartenires.delete');
        //================================panier prod update delete================//
        Route::put('/possedes/{id}/update',[ProduitController::class,'updateQuantite'])->name('possedes.update');
        Route::get('/possedes/{id}/delete',[ProduitController::class,'delete'])->name('possedes.delete');

        Route::get('basket', [BasketController::class,'show'])->name('basket.show');
        Route::delete('basket/remove/{medicament}', [BasketController::class,'remove'])->name('basket.remove');
//====================vider le panier======================================//
        Route::get('basket/empty', [Connexion::class,'empty'])->name('basket.empty');
//========================prod====================================================//
        Route::get('/produits{produit}',[ProduitController::class,'show'])->name('produits.show');
      //  Route::post('produits/add/{produit}', [ProduitController::class,'add'])->name('produits.add');
      Route::get('/choisirPharmacie/{id}',[PharmacieController::class,'choisirPharmacie'])->name('choisirPharmacie');

//=========================groupes des routes pour le produits=========================//
        //===================================liste des routes pur ajouter,editer,lister et supprimer un produit=======================================================//
        Route::get('/ajout',[ProduitController::class, 'index'])->name('ajout');
        Route::post('/ajout',[ProduitController::class, 'store'])->name('ajout2');

//================commander un produit=====================================================//


//==================route pour qui retourne la vue commder.blade.php=====================//
        Route::get('/commandeProd',[ProduitController::class,'commandeProd'])
        ->name('commandeProd');
//====================route qu'on va mettre dans le formaillaire de la vue commander.blade.php======//
        Route::post('/detailleCommandeProd',[ProduitController::class,'detailleCommandeProd'])
        ->name('detailleCommandeProd');
//====================route pour lister les commandes===============================================//
        Route::get('/listerCommandesProd',[ProduitController::class,'listerCommandesProd'])->name('listerCommandesProd');
        Route::get('/DetailsCommandesProd/{id}',[ProduitController::class,'DetailsCommandesProd'])->name('DetailsCommandesProd');








        
//=============================lister produit categorie huile de massage======================================================//
        Route::get('/listerhuileMassage',[ProduitController::class,'listerhuileMassage'])->name('listerhuileMassage');

//=============================lister produit categorie huile listerparfums======================================================//
        Route::get('/listerparfums',[ProduitController::class,'listerparfums'])->name('listerparfums');

//=============================lister produit categorie huile listerCrémeVisage======================================================//
        Route::get('/listerCrémeVisage',[ProduitController::class,'listerCrémeVisage'])->name('listerCrémeVisage');

//=============================lister produit categorie huile listerCremePeau======================================================//
        Route::get('/listerCremePeau',[ProduitController::class,'listerCremePeau'])->name('listerCremePeau');

        
        //====================================lister les produits=====================================================//
        Route::get('/liste', [ProduitController::class, 'lister'])->name('produits');
        
        //==================================editer et update un produit=========================================================//
        Route::get('/produits/{produit}/edit',[ProduitController::class,'edit'])->name('produits.edit');
        Route::put('/produits/{produit}/update',[ProduitController::class,'update'])->name('produits.update');
             
        //==========================================supprimer un produit=====================================//
        Route::delete('/produits/{produit}/delete',[ProduitController::class,'deleteProduit'])->name('produits.delete');
        //======================================ajouter un produit==============================//
        Route::post('produits/add/{produit}', [ProduitController::class,'add'])->name('produits.add')->Middleware('auth');;
        //========================route pour rechercher un medicament produit================//
        Route::get('/panierProd',[ProduitController::class,'panierProd'])->name('panierProd');
        Route::get('/search', [ProduitController::class,'search'])->name('product.search');
          
        //========================route pour rechercher un medicament produit================//
        Route::get('/panierProd',[ProduitController::class,'panierProd'])->name('panierProd');
        Route::get('/search', [ProduitController::class,'search'])->name('product.search');
        //==================route pour rechercher un produit=======================//
        Route::get('/search2', [ProduitController::class,'search2'])->name('medoc.search2');
       
//===========================route pour le stock de medicament================================================================// 
        Route::get('/stock', [PanierController::class,'stock'])->name('stock');
    
        Route::get('/alerteQuantite', [PanierController::class,'alerteQuantite'])->name('alerteQuantite');
    
        Route::delete('{medicament}/deletestock',[medicamentControler::class,'delete'])->name('medicaments.deleteStock');

        Route::get('/medicamentAll',[PanierController::class,'medicamentAll'])->name('medicamentAll');
        
//===============================//============================================================//       
        Route::get('dashboad',[Connexion::class,'dashboad']);

        //========================route pour aller dans trimedoc===========================//
        Route::get('/trimedoc',[Connexion::class,'trimedoc']);
//=================================entete======================================================================//
        Route::get('/entete',[Connexion::class,'entete']);
        
//=========================//============================================//
        Route::get('/pharmaChoice/{id}',[Connexion::class,'pharmaChoice'])->name('pharmaChoice');

        Route::get('/detailPharmacie{user}', [UserController::class,'detailPharmacie'])->name('detailPharmacie');
