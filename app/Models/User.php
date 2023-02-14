<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Commande;
use App\Models\Panier;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasFactory,Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    //public $timestamps=false;
    public $email_verified_at=false;
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

     // 1 client has many commandes
     public function commandes() { 
        return $this->hasMany(Commande::class);
     }

     public function paniers() { 
        return $this->hasMany(Panier::class);
     }
    //  protected static function boot(){
    //     parent::boot();

    //     static::created(function($user){
    //       $data =   $user->profile()->create([
    //             'title'=>'Profil de'.$user->username
    //         ]);
    //          });
    //  }

    public function count()
    {
        $user = Auth::user()->id;
        //=================id_panier de l'utilisateur connecter============================
        $pane = DB::select('select id from paniers where user_id = ?',[$user]);
        //print_r ($pane[0]->id);exit();
        $c=DB::table('appartenires')->where('id_panier',$pane[0]->id)->count();

 
    }
}
