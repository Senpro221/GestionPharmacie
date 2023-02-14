<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panier extends Model
{
    use HasFactory;

// public $timestamps=false;


    public function users() { 
        return $this->belongsTo(User::class);
     }
     // 1 commande has many produits 
     public function medicaments() {
         return $this->hasMany(Medicament::class); 
        }
}
