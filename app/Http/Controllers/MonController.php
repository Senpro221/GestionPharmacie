<?php

namespace App\Http\Controllers;
use App\Http\Requests\medicamentRequest;
use Illuminate\Http\Request;
use App\Http\Requests\pharmaRequest;
use App\Models\Pharmacie;
use App\Models\Medicament;
use Illuminate\Support\Facades\Auth;

class MonController extends Controller
{
    public function show(Medicament $medicament)
{
      return view("medicaments.medoc", compact("medicament"));
}
//     
}