<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pharmacie;
use App\Models\Medicament;
use Illuminate\Support\Facades\DB;
class PanierController extends Controller
{
     public function stock(Medicament $stocks)
    {
        $stocks = DB::select('select m.id,m.statut,m.nom,m.dlc,s.quantiteStock,s.quantiteMinim from medicaments m,stocks s where m.id = s.id_medoc');
        return view('stock.stock',compact('stocks'));
    }

    
    public function alerteQuantite(Medicament $stocks)
    {
        $stocks = DB::select('select * from medicaments,stocks where medicaments.id=stocks.id_medoc');
        return view('stock.alerteQuantite',compact('stocks'));
    }

    //suppression de medicament
    public function delete(Medicament $medicament)
    {
        $medicament->delete();
        return redirect()->Route('medicaments.deleteStock')->with('success', 'Ce médicament a été supprimé avec succée');
    }

}
