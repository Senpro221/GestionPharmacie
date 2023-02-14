<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Medicament;
use App\Http\Requests\UserLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class HomController extends Controller
{
    
    public function index()
    {
        return view('Gerants.adminGerant');
    }

   
    public function create()
    {
        $users = DB::table('users')->where('role', '=' ,'vendeur')->get();
         return view('Gerants.create',[
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
            return redirect()->back()->with('success','Votre compte a ete creer ');
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

       return redirect("/userregister")->with('success', 'user a été mise à jour');
    }

    public function delete(User $user)
    {
        $user->delete();
        return redirect("/userregister")->with('success', 'user a été supprimer avec succée');
    }

    public function vente()
    {
        $medicaments=Medicament::all();
        return view('vendeurs.vente',[
            'medicaments'=>$medicaments
        ]);
    }

      //editer
      public function vendre(Medicament $medicament)
      {
          return view('vendeurs.edit',[
              'medicament'=>$medicament
          ]);
      }

    public function updateVente(Medicament $medicament, Request $request) {
		
		$count=0;
    	// Validation de la requête
    	$this->validate($request, [
    		"quantite" => "numeric|min:1",
			"image"=>"string"
    	]);

            $medicament['quantite'] - $request['quantite'];
            $count--;
    }    
}
