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
        $pharma= DB::select('select id from pharmacies where user_id = ?', [Auth::user()->id]);
      
       session(['idPharmacie'=>$pharma[0]->id]);
       if($request->session()->has('idPharmacie')){
        $pharma =  session('idPharmacie');  
    
        $medoc =  DB::select('select * from orders,medicaments,commandes where orders.id_medoc=medicaments.id and commandes.id_pharma=?',[$pharma]);   
        $medicament =  DB::select('select * from orders,medicaments,commandes where orders.id_medoc=medicaments.id  and orders.id_commande=commandes.id  and id_pharma=?',[$pharma]);    
     
       $commande = DB::select('select * from commandes,users where commandes.user_id=users.id  and commandes.id_pharma=?',[$pharma]);
       $ventes = DB::select('select * from vendres,medicaments where vendres.id_medoc = medicaments.id and user_id=?',[Auth::user()->id]); 

        return view('Gerants.adminGerant',[
            'request'=>$request,
            'commande'=>$commande,
            'medoc'=>$medoc,
            'medicament'=>$medicament,
            'ventes'=>$ventes
        ]);
    }}
    
    public function adminSuper()
    {
        return view('adminSuper');
    }

    public function create(Request $request)
    {
        //$users = DB::table('users')->where('role', '=' ,'vendeur')->get();
       if($request->session()->has('idPharmacie')){
        $pharma = session('idPharmacie'); 
        $users = DB::select("select * from users where role='vendeur' and id_pharma=?",[$pharma]);
         return view('Gerants.create',[
            'users'=>$users

       ]);
    }}

    public function createSuperPharmacie()
    {
        $users = DB::table('users')->get();
         return view('users.createSuperPharmacie',[
            'users'=>$users

       ]);
    }
       
    
        public function handlecreate(User $user, Request $request)
        {
            if($request->session()->has('idPharmacie')){
                $pharma =  session('idPharmacie');
            $name = $request->name;
            $prenom = $request->prenom;
            $email = $request->email;
            $telephone = $request->telephone;
            $adress = $request->adress;
            $role = $request->role;
            $password = Hash::make($request->password);
    
            DB::insert('insert into users (name,prenom,email,telephone,adress,role,password,id_pharma) values (?, ?, ?, ?, ?, ?, ?, ?)', [$name,$prenom,$email,$telephone,$adress,$role,$password,$pharma,]);
            return redirect()->back()->with('success','Votre compte  a été créé avec succés');
        }}


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
            
       $pharma= DB::select('select id from pharmacies where user_id = ?', [Auth::user()->id]);
      
       session(['idPharmacie'=>$pharma[0]->id]);
       if($request->session()->has('idPharmacie')){
        $pharma =  session('idPharmacie');  
    
    $commande = DB::select('select * from commandes,users where commandes.user_id=users.id and commandes.id_pharma=?',[$pharma]);
    $medoc =  DB::select('select * from orders,medicaments,commandes where orders.id_medoc=medicaments.id and commandes.id_pharma=?',[$pharma]);   
    $medicament =  DB::select('select * from orders,medicaments,commandes where orders.id_medoc=medicaments.id and commandes.id_pharma=?',[$pharma]);    
   

    $ventes = DB::select('select * from vendres,medicaments where vendres.id_medoc = medicaments.id and user_id=?',[Auth::user()->id]); 

    return view('Gerants.adminGerant',[
            'commande'=>$commande,
            'request'=>$request,
            'medoc'=>$medoc,
            'medicament'=>$medicament,
            'ventes'=>$ventes
            ]);
         
    }}

    public function espaceVente(Request $request,$id){
            
        $pharma= DB::select('select pharmacies.id from pharmacies,users where users.role = ?', [Auth::user()->role]);
       
        session(['idPharmacie'=>$pharma[0]->id]);
        if($request->session()->has('idPharmacie')){
         $pharma =  session('idPharmacie');  
        
        $ventes =  DB::select('select * from vendres,medicaments where vendres.id_medoc=medicaments.id');   
        // $medicament =  DB::select('select * from orders,medicaments,commandes where orders.id_medoc=medicaments.id and commandes.id_pharma=?',[$pharma]);    
    
     return view('Gerants.adminVendeur',[
             'ventes'=>$ventes,
             'request'=>$request,
             ]);
         
     }}
}
