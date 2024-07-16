<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Enums\EtatParcelle;
use App\Models\Parcelle;
use Illuminate\Http\Request;
use App\Models\Dossier;
use Illuminate\Support\Facades\DB;

class MaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Récupérer le nombre total de dossiers
        $totalDossiers = Dossier::count();

        // Récupérer les données pour le diagramme en barre
        $data = Dossier::select('type', DB::raw('count(*) as total'))
                       ->groupBy('type')
                       ->get();

        // Structurez vos données pour le diagramme en barre
        $labels = $data->pluck('type')->toArray();
        $prices = $data->pluck('total')->toArray();

        // Calculer les totaux pour le diagramme circulaire
        $totalParcelles = Parcelle::count();
        $totalConstruction = Parcelle::where('statut_parcelle_id', EtatParcelle::Construction)->count();
        $totalLibre = Parcelle::where('statut_parcelle_id', EtatParcelle::Libre)->count();
        $totalBatie = Parcelle::where('statut_parcelle_id', EtatParcelle::Batie)->count();

        return view('maire.index', compact('labels', 'prices', 'totalDossiers', 'totalBatie', 'totalConstruction', 'totalLibre'));
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
