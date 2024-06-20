<?php

namespace App\Http\Controllers\User;

use App\Enums\EtatDossier;
use App\Http\Controllers\Controller;
use App\Models\Dossier;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProprietaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $dossiers = auth()->user()->userDossiers()->paginate(10);
        $dossiers->load('parcelle');
        $dossierProcess = auth()->user()->userDossiers()->where('statut', EtatDossier::En_attente)->count();
        $dossierApprouve = auth()->user()->userDossiers()->where('statut', EtatDossier::Approuve)->count();
        $dossierRejete = auth()->user()->userDossiers()->where('statut', EtatDossier::Refuse)->count();

        return view('proprietaire.index', compact('dossiers', 'dossierProcess', 'dossierApprouve', 'dossierRejete'));
    }


    /* Pour afficher les dossier en attente :

        $dossiers = auth()->user()->userDossiers()->where('etat_dossier', EtatDossier::EN_ATTENTE)
        ->paginate(10);

    return view('dossiers.index', compact('dossiers'));
    */

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function destroy(string $id)
    {
        //
    }
}
