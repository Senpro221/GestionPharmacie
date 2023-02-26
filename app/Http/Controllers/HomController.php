<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Medicament;
use App\Models\Pharmacie;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class HomController extends Controller
{
    
    public function index(Request $request)
    {
        return view('Gerants.adminGerant',compact('request'));
    }

    public function adminSuper()
    {
        return view('adminSuper');
    }

    public function create()
    {
        $users = DB::table('users')->where('role', '=' ,'vendeur')->get();
         return view('Gerants.create',[
            'users'=>$users

       ]);
    }

    public function createSuperPharmacie()
    {
        $users = DB::table('users')->get();
         return view('users.createSuperPharmacie',[
            'users'=>$users

       ]);
    }
       
    
        public function handlecreate(User $user, Request $request)
        {
            $user->name = $request->name;
            $user->prenom = $request->prenom;
            $user->email = $request->email;
            $user->telephone = $request->telephone;
            $user->adress = $request->adress;
            $user->role = $request->role;
            $user->password = Hash::make($request->password);
    
            $user->save();
            return redirect()->back()->with('success','Votre compte  a été créé avec succés');
        }


        public function creationSuperPharmacie(User $user, Request $request)
        {
            $user->name = $request->name;
            $user->prenom = $request->prenom;
            $user->email = $request->email;
            $user->telephone = $request->telephone;
            $user->adress = $request->adress;
            $user->role = $request->role;
            $user->password = Hash::make($request->password);
    
            $user->save();
            return redirect('/allUser')->with('success','Votre compte  a été créé avec succés');
        }

       public function edit(User $user)
        {
            return view('Gerants.edit',[
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

       return redirect("/userregister")->with('success', 'Ce compte à été mise à jour');
    }

    public function delete(User $user)
    {
        $user->delete();
        return redirect("/userregister")->with('success', 'Ce compte à été supprimer avec succée');
    }

    public function accederPharmacie(Request $request,$id){
       // $pharma = Pharmacie::find($id);

       $pharma= DB::select('select id from pharmacies where user_id = ?', [Auth::user()->id]);
       //dd($pharma[0]->id);
       session(['idPharmacie'=>$pharma[0]->id]);
        //session(['nomPharmacie'=>$pharma->nom]);

        return redirect()->Route('adminGerant');
        
    }
}
