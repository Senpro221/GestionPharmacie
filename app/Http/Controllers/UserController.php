<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserLoginRequest;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
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
        return redirect()->back()->with('success','Votre compte a ete creer ');
    }


    public function login()
    {
        return view('users.registre');
    }

    public function handleLogin(Request $request)
    {

       $credentials =  $request->validate([
            'email'=>['required','email'],
            'password'=> ['required'],
       ]);
       if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if(Auth::user()->role === 'admin'){
                return view('admin');
             }else{
                return redirect('/visiteure');
             }
            
        }else{
          return redirect()->back()->with('error','login ou mot de passe incorecte');
        }
    }
    public function logout()
    {
       Session::flush();
       Auth::logout();
       return redirect('login');
    }

    public function listeUser()
    {
        $users = DB::table('users')->where('role', '=' ,'vendeur')->get();

       return view('users.listeUser',[
            'users'=>$users

       ]);
    }

    public function delete(User $user)
    {
        $user->delete();
        return redirect("/listeUser")->with('success', 'user a été supprimer avec succée');
    }


    //utili
        //editer
        public function edit(User $user)
        {
            return view('users.edit',[
                'user'=>$user
            ]);
        }
    //update
         public function update(User $user,UserLoginRequest $request)
         {
            $user->name = $request->name;
            $user->prenom = $request->prenom;
            $user->email = $request->email;
            $user->telephone = $request->telephone;
            $user->adress = $request->adress;
            $user->password = Hash::make($request->password);
    
            $user->save();
    
            return redirect('/listeUser')->with('success', 'Medicament a été mise à jour');
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
             return redirect()->back()->with('success','Ajout avec succé  ');
    }
    //profile
    
    //utili
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

        return redirect('profile')->with('status', 'profile-updated');
    
  }   

  public function inscription()
  {
      return view('users.registrepharma');
  }

  public function handleInscription(User $user, UserLoginRequest $request)
  {
      $user->name=$request->name;
      $user->prenom=$request->prenom;
      $user->email=$request->email;
      $user->statut=$request->statut=false;
      $user->nom=$request->nom;
      $user->adresse=$request->adresse;
      $user->ville=$request->ville;
      $user->quartier=$request->quartier;
      $user->telephone=$request->telephone;
      $user->password=Hash::make($request->password);
   
      $user->save();
      return redirect()->back()->with('success','Votre compte a ete creer ');
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
           }else{
             return redirect('/dashboad');
           }
          
      }else{
        return redirect()->back()->with('error','login ou mot de passe incorecte');
      }
}



   public function listePharma(){
   
      $pharmacie=DB::select('select * from users where statut=0 | statut=1');
      
      return view('pharmacie.listePharmacie',['pharmacie'=>$pharmacie]);
   }

   public function listePharmacl(){
   
    $pharmacie=DB::select('select * from users where statut=0 | statut=1');
    
    return view('pharmacie.listePharmaCl',['pharmacie'=>$pharmacie]);
 }


   public function statut(Request $request,$id){
      $data = User::find($id);
      if($data->statut==0){
          $data->statut=1;
      }else{
          $data->statut=0;
      }
      $data->save();

      return redirect('listePharmacie')->with('success','statut has been changed successfully.');
   }
  
}