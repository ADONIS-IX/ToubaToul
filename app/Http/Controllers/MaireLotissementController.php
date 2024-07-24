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
            'plan_lotissement' => 'required|file|mimes:jpeg,png,pdf|max:2048',
            'plan_urbanisme_directeur' => 'required|file|mimes:jpeg,png,pdf|max:2048',
        ], [
            'plan_lotissement.required' => 'Le champ :attribute est requis pour ce type de dossier.',
            'plan_lotissement.file' => 'Le champ :attribute doit être un fichier.',
            'plan_lotissement.mimes' => 'Le champ :attribute doit être de type JPEG, PNG ou PDF.',
            'plan_lotissement.max' => 'Le fichier du champ :attribute ne doit pas dépasser 2 Mo.',
        ]);

        Lotissement::create($request->all());

        return redirect()->route('maire.index')->with('success', 'Lotissement créé avec succès');
    }
}
