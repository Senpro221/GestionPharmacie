<?php

namespace App\Models;
use App\Models\Commande;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicament extends Model
{
    use HasFactory;
    protected $guarded= [''];
    // 1 produit belongs to many commandes

    public function commandes() { 
        return $this->belongsToMany(Commande::class);
    }
}
