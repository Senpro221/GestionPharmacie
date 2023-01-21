<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\pharmaRequest;
use App\Models\Pharmacie;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use DB;
class PharmacieController extends Controller
{
    public function choice(){
        return view('pharmacie.choice');
    }
//==================//=============================//
    public function inscription()
    {
        return view('pharmacie.registrepharma');
    }

    public function handleInscription(Pharmacie $pharmacie, Request $request)
    {
        $pharmacie->name=$request->name;
        $pharmacie->prenom=$request->prenom;
        $pharmacie->email=$request->email;
        $pharmacie->statut=$request->statut=false;
        $pharmacie->password=Hash::make($request->password);
        $pharmacie->nom=$request->nom;
        $pharmacie->adresse=$request->adresse;
        $pharmacie->ville=$request->ville;
        $pharmacie->quartier=$request->quartier;
        $pharmacie->telephone=$request->telephone;
     
        $pharmacie->save();
        return redirect()->back()->with('success','Votre compte a ete creer ');
    }

    public function Connexionlogin()
    {
        return view('pharmacie.registrepharma');
    }


    public function handleAccesLogin(PharmaRequest $credentials, Request $request)
    {

       $credentials =  $request->validate([
            'email'=>['required','email'],
            'password'=> ['required'],
       ]);
       if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if(Auth::user()->statut === '0'){
                return redirect('/');
             }else{
                    return redirect('/login');
             }
        }else{
          return redirect()->back()->with('error','login ou mot de passe incorecte');
        }
    }


    //  public function listePharma()
    //  {
    //    $pharmacie = Pharmacie::all();
 
    //     return view('pharmacie.listePharmacie',[
    //          'pharmacie'=>$pharmacie
 
    //     ]);
    //  }

    //  public function search(Request $request){
    //     if($request->filled('search')){
    //         $pharmacie=Pharmacie::search($request->search)->get();
    //     }else{
    //         $pharmacie = Pharmacie::paginate(15);
    //     }
    //     return view('pharmacie.searche',compact('$pharmacie'));
    //  }

     public function listePharma(){
        $pharmacie=DB::table('pharmacies')->get();
        return view('pharmacie.listePharmacie',['pharmacie'=>$pharmacie]);
     }

     public function statut(Request $request,$id){
        $data = Pharmacie::find($id);
        if($data->statut==0){
            $data->statut=1;
        }else{
            $data->statut=0;
        }
        $data->save();

        return redirect('listePharmacie')->with('success','statut has been changed successfully.');
     }
}
