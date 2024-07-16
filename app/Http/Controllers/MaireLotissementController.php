<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Localite;
use App\Models\Lotissement;

class MaireLotissementController extends Controller
{
    public function index()
    {
        $localites = Localite::all();
        return view('maire.lotissement', compact('localites'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'localite_id' => 'required|exists:localites,id',
            'titre' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:lotissements,slug',
            'plan_lotissement' => 'required|string|max:255',
            'plan_urbanisme_directeur' => 'required|string|max:255',
        ]);

        Lotissement::create($request->all());

        return redirect()->route('index')->with('success', 'Lotissement créé avec succès');
    }
}
