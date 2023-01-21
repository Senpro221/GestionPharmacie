<?php

namespace App\Models;
use App\Models\User;
use App\Models\Medicament;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
  // 1 commande belong to 1 user 
  public function users() { 
    return $this->belongsTo(User::class);
 }
 // 1 commande has many produits 
 public function medicaments() {
     return $this->hasMany(Medicament::class); 
    }
}
