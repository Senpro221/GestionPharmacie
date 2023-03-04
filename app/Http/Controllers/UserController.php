<?php

namespace App\Http\Controllers;
use App\Models\Pharmacie;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserLoginRequest;
use Illuminate\Support\Facades\DB;
use App\Notifications\envoiMessage;

class UserController extends Controller
{

    public function contact()
    {
        return view('users.contact');
    }


    public function apropos()
    {
        return view('users.apropos');
    }


  public  function allUser(User $users){
    $users = User::all();
    return view('users.allUser',compact('users'));
  }

    public function register()
    {
        return view('users.registre');
    }
   

    public function handleRegistration(User $user, UserLoginRequest $request)
    {
        $user->name = $request->name;
        $user->prenom = $request->prenom;
        $user->email = $request->email;
        $user->telephone = $request->telephone;
        $user->adress = $request->adress;
        $user->password = Hash::make($request->password);
        $user->save();

        $user = $user->id;
        $pan=DB::insert('insert into paniers (user_id) values (?)', [$user]);
        
        return redirect()->back()->with('success','Votre compte a été créé avec');
    }


    public function login()
    {
        return view('users.registre');
    }
//==================================connexion d'un utilisateur=================================//
    public function handleLogin(Request $request)
    {
       $credentials =  $request->validate([
            'email'=>['required','email'],
            'password'=> ['required'],
       ]);
       if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            session();
            if(Auth::user()->role === 'admin'){
                return redirect('/admin');
            }elseif(Auth::user()->role === 'super'){
                return redirect('/adminSuper');
                
            }elseif(Auth::user()->statut == '1'){
                return redirect()->Route('pagePharmacie');
            }elseif( Auth::user()->role ==='vendeur'){
                return redirect()->Route('pagePharmacie');
            
            }else{
                return redirect('/visiteure');
            }
            
        }else{
          return redirect()->back()->with('error','login ou mot de passe incorrecte');
        }
        
    }
//======================================deconnexion d'un utilisateur===========================//
    public function logout()
    {
       Session::flush();
       Auth::logout();
       return redirect('login');
    }
//==================================lister les utilisateurs ayant le rols vendeurs==============//
    public function listeUser()
    {
        $users = DB::table('users')->where('role', '=' ,'vendeur')->get();

       return view('users.listeUser',[
            'users'=>$users

       ]);
    }

//===================================supprimer un compte utilisateur============================//
    public function delete(User $user)
    {
        $user->delete();
        return back()->with('success', 'Ce compte a été supprimé avec succée');
    }

//==================================editer compte utilisateur=================================//
        public function edit(User $user)
        {
            return view('users.edit',[
                'user'=>$user
            ]);
        }
//=================================update profil utilisateur================================//
         public function update(User $user,UserLoginRequest $request)
         {
            $user->name = $request->name;
            $user->prenom = $request->prenom;
            $user->email = $request->email;
            $user->telephone = $request->telephone;
            $user->adress = $request->adress;
            $user->password = Hash::make($request->password);
            $user->save();
    
            return redirect('/listeUser')->with('success', 'Ce médicament a été mise à jour');
         }
    

         public function create()
         {
             return view('users.create');
         }
        
     
         public function handlecreate(User $user, UserRequest $request)
         {
             $user->name = $request->name;
             $user->prenom = $request->prenom;
             $user->email = $request->email;
             $user->telephone = $request->telephone;
             $user->adress = $request->adress;
             $user->role = $request->role;
             $user->password = Hash::make($request->password);
     
             $user->save();
             return redirect()->back()->with('success','Ajout avec succés  ');
    }

        //editer
        public function editprofile(Request $request)
        {
            return view('profile', [
                'user' => $request->user(),
            ]);
        }
    //update
         public function profileupdate(UserLoginRequest $request)
         {
            $request->User()->fill($request->validated());
            $request->User()->email_verified_at = null;
            $request->User()->name = $request->name;
            $request->User()->prenom = $request->prenom;
            $request->User()->email = $request->email;
            $request->User()->adress = $request->adress;
            $request->User()->telephone = $request->telephone;
            $request->User()->password = $request->password;

            $request->user()->save();

        return redirect('profile')->with('success', 'Profile modifié avec succés');
    
  }   

  public function inscription()
  {
      return view('users.registrepharma');
  }

  public function handleInscription(User $user,Pharmacie $pharma, UserLoginRequest $request)
  {
    $user->name = $request->name;
    $user->statut = $request->statut=false;
    $user->prenom = $request->prenom;
    $user->email = $request->email;
    $user->telephone = $request->telephone;
    $user->adress = $request->adress;
    $user->role = $request->role;
    $user->password = Hash::make($request->password);
    $user->save();

    //===========================recuperation des infos de la pharmace===========//
     $s = $user->id;
      $nom = $request->nom;
      $adresse = $request->adresse;
      $ville = $request->ville;
      $quartier = $request->quartier;
      $telephone = $request->telephone;
    //==================================INSERTION AU NIVEAU DE LA TABLE PHARMACIE===========//
    DB::insert('insert into pharmacies (nom,telephone,adresse,ville,quartier,user_id) values(?, ?, ?, ?, ?, ?)',[$nom,$telephone,$adresse,$ville,$quartier,$s]);
    return redirect()->back()->with('success','Votre compte a été créé ');
  }

  public function Connexionlogin()
  {
      return view('users.registrepharma');
  }



  public function  handleAccesLogin(Request $request)
  {
     $credentials =  $request->validate([
          'email'=>['required','email'],
          'password'=> ['required'],
     ]);
     if (Auth::attempt($credentials)) {
          $request->session()->regenerate();
          if(Auth::user()->role === 'admin'){
              return view('admin');
           }elseif(Auth::user()->statut == '1' || Auth::user()->role === 'vendeur'){
                return view('pharmacien');
           }else{
            return redirect('/dashboad');
           }
          
      }else{
        return redirect()->back()->with('error','login ou mot de passe incorrecte');
      }
}


   public function listePharma(){
   
      $pharmacie=DB::select('select * from users where statut=0 || statut=1');
      return view('pharmacie.listePharmacie',['pharmacie'=>$pharmacie]);
   }

     public function detailPharmacie(User $user,Pharmacie $pharmacie){
        // $pharmacie = Pharmacie::all();
        // $pharmacie=DB::select('select * from users,pharmacies where users.id=pharmacies.user_id and statut=1');  

        return view('pharmacie.DetailsPharmacie',[
            'user'=>$user,
            'pharmacie'=>$pharmacie
        ]);
     }

   public function statut(Request $request,$id){
      $data = User::find($id);
      if($data->statut==0){
          $data->statut=1;
      }else{
          $data->statut=0;
      }
      $data->save();
      return redirect('listePharmacie')->with('success','Ce compte à été activé avec succés.');
   }

}

