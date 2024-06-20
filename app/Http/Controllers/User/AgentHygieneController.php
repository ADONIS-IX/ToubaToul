<?php

namespace App\Http\Controllers\User;

use App\Enums\Avis;
use App\Enums\EtatDossier;
use App\Enums\Role;
use App\Enums\TypeDossier;
use App\Http\Controllers\Controller;
use App\Models\Dossier;
use Illuminate\Http\Request;

class AgentHygieneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dossiers = Dossier::with(['parcelle.lotissement.localite', 'user'])
        ->whereIn('type', [TypeDossier::Construction])
        ->where('statut', EtatDossier::En_attente)
        ->whereDoesntHave('observations.user', function ($query) {
            $query->where('role', Role::Agent_Hygiene);
            })
        ->oldest()
        ->paginate(10);

        $totalDossiers = Dossier::whereIn('type', [TypeDossier::Construction])
        ->whereIn('statut', EtatDossier::cases())
        ->whereHas('observations.user', function ($query) {
            $query->where('role', Role::Agent_Hygiene);})->count();

        /**
         * (ici pour recuperer uniquement le total des dossier Approuve)
        *$totalDossiers = Dossier::whereIn('type', [TypeDossier::Construction])
        *->where('statut', EtatDossier::Approuve)
        *->whereHas('observations.user', function ($query) {
        *    $query->where('role', Role::Agent_Hygiene);})->count();
        */

        $totalApprouve = Dossier::whereIn('type', [TypeDossier::Construction])
        ->whereIn('statut', [EtatDossier::En_attente, EtatDossier::Approuve])
        ->whereHas('observations', function ($query) {
            $query->whereHas('user', function ($query) {
                $query->where('role', Role::Agent_Hygiene);
            })->where('avis', Avis::Favorable);
        })->count();

        $totalRefuse = Dossier::whereIn('type', [TypeDossier::Construction])
        ->where('statut', EtatDossier::En_attente)
        ->whereHas('observations', function ($query) {
            $query->whereHas('user', function ($query) {
                $query->where('role', Role::Agent_Hygiene);
            })->where('avis', Avis::Reserve);
        })->count();

        $totalAttente = $dossiers->total();

        return view('agent.hygiene.index', [
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
