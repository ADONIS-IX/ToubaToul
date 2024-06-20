<?php

namespace App\Http\Controllers;

use App\Enums\EtatDossier;
use App\Enums\Role;
use App\Enums\TypeDossier;
use App\Models\Dossier;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DomanialeInstructionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $dossiers = Dossier::with(['user', 'parcelle', 'parcelle.lotissement.localite'])
        ->where('type', [TypeDossier::Construction])
        ->where('statut', EtatDossier::En_attente)
        ->whereDoesntHave('observations.user', function ($query) {
            $query->where('role', Role::Agent_Domaniale);
            })
        ->oldest()
        ->paginate(10);

        return view('agent.domaniale.instruction.index', compact('dossiers'));
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
    public function show(Dossier $dossier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dossier $dossier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dossier $dossier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dossier $dossier)
    {
        //
    }
}
