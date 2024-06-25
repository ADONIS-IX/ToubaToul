<?php

namespace App\Http\Controllers\User;

use App\Enums\EtatDossier;
use App\Enums\TypeDossier;
use App\Http\Controllers\Controller;
use App\Http\Requests\TerrainRequest;
use App\Models\Dossier;
use App\Models\PieceDossier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class DepositaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('depositaire.index', [
            'dossiers' => auth()->user()->userDossiers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = TypeDossier::cases();
        return view('depositaire.dossier', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TerrainRequest $request)
    {
        $dossier = Dossier::create([
            'type' => 'Terrain',
            'slug' => 'terrain',
            'user_id' => Auth::id(),

        ]);

        if ($request->hasFile('piece_identite')) {
            $path = $request->file('piece_identite')->store('piece_identite', 'public');

            // Créer l'entrée dans la table piece_dossiers
            PieceDossier::create([
                'nom' => $path,
                'dossier_id' => $dossier->id,
                'user_id' => Auth::id(),
                'is_admin' => false, // ou true si l'admin l'ajoute
            ]);
        }
        return redirect()->route('depositaire.index')->withStatus('Dossier créé avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $dossier = Dossier::findOrFail($id);
        $dossier->load('pieceDossier', 'observations');

        if ($dossier->user_id != auth()->id()) {
            abort(403, 'Vous n\'avez pas la permission de voir ce dossier.');
        }

        return view('depositaire.show', compact('dossier'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $dossier = Dossier::findOrFail($id);
        // Supprimer les fichiers associés aux pièces d'identité
        foreach ($dossier->pieceDossier as $piece) {
            Storage::disk('public')->delete($piece->nom);
        }

        // Supprimer le dossier et les pièces associées
        $dossier->delete();

        return redirect()->route('depositaire.index')->withStatus('Dossier supprimé avec succès');
    }
}
