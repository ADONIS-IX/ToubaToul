<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Localite;

class MaireLocaliteController extends Controller
{
    public function index()
    {
        return view('maire.localite');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'population' => 'required|numeric',
            'superficie' => 'required|numeric',
        ]);

        Localite::create([
            'nom' => $request->nom,
            'population' => $request->population,
            'superficie' => $request->superficie,
        ]);

        return redirect()->route('index')->with('success', 'Localité ajoutée avec succès.');
    }
}
