<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    // 1 commande belong to 1 user 
  public function user() { 
    return $this->belongsTo(User::class);
 }

 
 // 1 commande has many produits 
 public function medicaments() {
     return $this->hasMany(Medicament::class); 
    }
}
