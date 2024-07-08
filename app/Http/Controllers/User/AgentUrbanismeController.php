<?php

namespace App\Http\Controllers\User;

use App\Enums\EtatDossier;
use App\Enums\TypeDossier;
use App\Http\Controllers\Controller;
use App\Models\Dossier;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AgentUrbanismeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dossiers = Dossier::whereIn('type', [TypeDossier::Construction])->where('statut', EtatDossier::En_attente)
        ->oldest()
        ->paginate(10);

        $dossiers->load('user');

        $totalDossiers = Dossier::whereIn('type', [TypeDossier::Construction])->count();
        $totalApprouve = Dossier::whereIn('type', [TypeDossier::Construction])->where('statut', EtatDossier::Approuve)->count();
        $totalRefuse = Dossier::whereIn('type', [TypeDossier::Construction])->where('statut', EtatDossier::Refuse)->count();
        $totalAttente = Dossier::whereIn('type', [TypeDossier::Construction])->where('statut', EtatDossier::En_attente)->count();

        return view('agent.urbanisme.index', [
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
    public function show(string $id): View
    {
        $dossier = Dossier::with('pieceDossier', 'parcelle')->findOrFail($id);

        return view('agent.urbanisme.show', compact('dossier'));
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
