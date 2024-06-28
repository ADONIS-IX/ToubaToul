<?php

namespace App\Http\Controllers\User;

use App\Enums\Avis;
use App\Enums\EtatDossier;
use App\Enums\Role;
use App\Enums\TypeDossier;
use App\Http\Controllers\Controller;
use App\Models\Dossier;
use Illuminate\Http\Request;

class AgentDomanialeController extends Controller
{

    public function index(Request $request)
    {
        $status = $request->query('status', EtatDossier::En_attente->value);
        $search = $request->query('search');

        $query = Dossier::with(['user'])
            ->where('type', TypeDossier::Terrain);

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

        $dossiers = $query->oldest()->paginate(10);

        $totalDossiers = Dossier::where('type', TypeDossier::Terrain)->count();
        $totalApprouve = Dossier::where('type', TypeDossier::Terrain)
            ->where('statut', EtatDossier::Approuve)->count();
        $totalRefuse = Dossier::where('type', TypeDossier::Terrain)
            ->where('statut', EtatDossier::Refuse)->count();
        $totalAttente = Dossier::where('type', TypeDossier::Terrain)
            ->where('statut', EtatDossier::En_attente)->count();

        return view('agent.domaniale.index', [
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
