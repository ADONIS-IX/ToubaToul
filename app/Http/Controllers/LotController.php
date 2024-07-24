<?php

namespace App\Http\Controllers;

use App\Models\Parcelle;
use Illuminate\Http\Request;

class LotController extends Controller
{
    public function index()
    {
        $user = auth()->user();
    $parcelles = Parcelle::where('proprietaire_id',  $user->id)
                         ->with(['lotissement', 'statutParcelle', 'droitProprietes'])
                         ->get();
    return view('proprietaire.lot', compact('parcelles'));
    }
}
