<?php

namespace App\Http\Controllers;

use App\Enums\EtatDossier;
use App\Enums\TypeDossier;
use App\Http\Controllers\Controller;
use App\Http\Requests\TerrainRequest;
use App\Models\Dossier;
use App\Models\PieceDossier;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\View\ViewException;

class MaireDemandeController extends Controller
{
    public function index(Request $request): View
    {
        $status = $request->query('status', EtatDossier::En_attente->value);
        $search = $request->query('search');

        // On ne filtre plus par type de dossier
        $query = Dossier::with(['user']);

        if ($status !== 'all') {
            $query->where('statut', $status);
        }

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('id', 'like', "%{$search}%")
                  ->orWhereHas('user', function($q) use ($search) {
                      $q->where('nom', 'like', "%{$search}%")
                        ->orWhere('prenom', 'like', "%{$search}%")
                        ->orWhere('adresse', 'like', "%{$search}%");
                  });
            });
        }

        $dossiers = $query->oldest()->paginate(100);

        // Calcul des totaux pour tous les types de dossiers
        $totalDossiers = Dossier::count();
        $totalApprouve = Dossier::where('statut', EtatDossier::Approuve)->count();
        $totalRefuse = Dossier::where('statut', EtatDossier::Refuse)->count();
        $totalAttente = Dossier::where('statut', EtatDossier::En_attente)->count();

        return view('maire.demande', [
            'dossiers' => $dossiers,
            'totalDossiers' => $totalDossiers,
            'totalApprouve' => $totalApprouve,
            'totalRefuse' => $totalRefuse,
            'totalAttente' => $totalAttente,
            'currentStatus' => $status,
            'search' => $search,
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
        $dossier = Dossier::with('pieceDossier')->findOrFail($id);

        return view('maire.show', compact('dossier'));
    }

    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */


}
