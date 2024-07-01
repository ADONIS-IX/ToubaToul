<?php

namespace App\Http\Controllers\User;

use App\Enums\EtatDossier;
use App\Enums\TypeDossier;
use App\Http\Controllers\Controller;
use App\Models\Dossier;
use App\Models\Parcelle;
use Illuminate\Http\Request;

class AgentImpotsDomainesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dossiers = Dossier::whereIn('type', [TypeDossier::Titre_Foncier])->where('statut', EtatDossier::En_attente)
        ->oldest()
        ->paginate(10);

        $dossiers->load('user');

        $totalDossiers = Dossier::whereIn('type', [TypeDossier::Titre_Foncier])->count();
        $totalApprouve = Dossier::whereIn('type', [TypeDossier::Titre_Foncier])->where('statut', EtatDossier::Approuve)->count();
        $totalRefuse = Dossier::whereIn('type', [TypeDossier::Titre_Foncier])->where('statut', EtatDossier::Refuse)->count();
        $totalAttente = Dossier::whereIn('type', [TypeDossier::Titre_Foncier])->where('statut', EtatDossier::En_attente)->count();

        return view('agent.impots-domaines.index', [
            'dossiers' => $dossiers,
            'totalDossiers' => $totalDossiers,
            'totalApprouve' => $totalApprouve,
            'totalRefuse' => $totalRefuse,
            'totalAttente' => $totalAttente,
        ]);
    }

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
        $validated = $request->validate([
            'numeroLot' => 'required|unique:parcelles,numeroLot',
            'superficie' => 'required|numeric',
            'coordonne_x' => 'required|numeric',
            'coordonne_y' => 'required|numeric',
            'lotissement_id' => 'required|exists:lotissements,id',
            'statut_parcelle_id' => 'required|exists:statut_parcelles,id',
            'proprietaire_id' => 'required|exists:users,id',
        ]);

        Parcelle::create($validated);

        return redirect()->route('impots-domaines.index')->with('success', 'Parcelle créée avec succès.');

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
