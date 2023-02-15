<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    protected $guarded= [''];

    public $timestamps=false;

    public function commandes() { 
        return $this->belongsToMany(Commande::class);
    }

    public function paniers() { 
        return $this->belongsToMany(Panier::class);
    }
}
