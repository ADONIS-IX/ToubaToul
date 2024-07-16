<?php

namespace App\Http\Controllers\User;

use App\Enums\Avis;
use App\Enums\EtatDossier;
use App\Enums\Role;
use App\Enums\TypeDossier;
use App\Http\Controllers\Controller;
use App\Models\Dossier;
use App\Models\Observation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AgentHygieneController extends Controller
{
    public function index(Request $request): View
    {
        $status = $request->query('status', 'en_attente');
        $search = $request->query('search');

        $query = Dossier::with(['user', 'parcelle.lotissement.localite', 'parcelle', 'observations', 'observations.user'])
            ->where('type', TypeDossier::Construction);

        switch ($status) {
            case 'en_attente':
                $query->whereDoesntHave('observations', function ($q) {
                    $q->whereHas('user', function ($u) {
                        $u->where('role', Role::Agent_Hygiene);
                    });
                })->where('statut', EtatDossier::En_attente);
                break;
                case 'favorable':
                    $query->whereHas('observations', function ($q) {
                        $q->where('avis', Avis::Favorable)
                            ->whereHas('user', function ($u) {
                                $u->where('role', Role::Agent_Hygiene);
                            });
                    });
                    break;
                case 'reserve':
                    $query->whereHas('observations', function ($q) {
                        $q->where('avis', Avis::Reserve)
                            ->whereHas('user', function ($u) {
                                $u->where('role', Role::Agent_Hygiene);
                            });
                    });
                    break;
                case 'all':
                    $query->whereHas('observations', function ($q) {
                        $q->whereHas('user', function ($u) {
                            $u->where('role', Role::Agent_Hygiene);
                        });
                    });
                    break;
        }

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('id', 'like', "%{$search}%")
                ->orWhereHas('user', function($q) use ($search) {
                    $q->where('nom', 'like', "%{$search}%")
                        ->orWhere('prenom', 'like', "%{$search}%");
                })
                ->orWhereHas('parcelle.lotissement.localite', function ($l) use ($search) {
                    $l->where('nom', 'like', "%{$search}%");
                });
            });
        }

        $dossiers = $query->oldest()->paginate(10);

        $totalAttente = Dossier::where('type', TypeDossier::Construction)
        ->where('statut', EtatDossier::En_attente)
        ->whereDoesntHave('observations', function ($q) {
            $q->whereHas('user', function ($u) {
                $u->where('role', Role::Agent_Hygiene);
            });
        })->count();

        $totalFavorable = Dossier::where('type', TypeDossier::Construction)
        ->whereHas('observations', function ($q) {
            $q->where('avis', Avis::Favorable)
                ->whereHas('user', function ($u) {
                    $u->where('role', Role::Agent_Hygiene);
                });
        })->count();

    $totalReserve = Dossier::where('type', TypeDossier::Construction)
        ->whereHas('observations', function ($q) {
            $q->where('avis', Avis::Reserve)
                ->whereHas('user', function ($u) {
                    $u->where('role', Role::Agent_Hygiene);
                });
        })->count();

    $totalDossiers = Dossier::where('type', TypeDossier::Construction)
        ->whereHas('observations', function ($q) {
            $q->whereHas('user', function ($u) {
                $u->where('role', Role::Agent_Hygiene);
            });
        })->count();

        return view('agent.hygiene.index', [
            'dossiers' => $dossiers,
            'totalDossiers' => $totalDossiers,
            'totalFavorable' => $totalFavorable,
            'totalReserve' => $totalReserve,
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
        // Récupérer l'ID du dossier depuis la requête
        $id = $request->input('dossier_id');

        // Valider les données du formulaire
        $validatedData = $request->validate([
            'avis' => 'required|in:' . implode(',', array_column(Avis::cases(), 'value')),
            'observation' => 'required_if:avis,Reserve|nullable|string|max:255',
            ]);

            $dossier = Dossier::findOrFail($id);

            $observation = new Observation();
            $observation->avis = $validatedData['avis'];
            $observation->content = $validatedData['observation'] ?? null;
            $observation->dossier_id = $dossier->id;
            $observation->agent_id = Auth::id();
            $observation->save();

            return redirect()->route('domaniale.instruction.show', $dossier->id)
            ->withStatus('Observation soumise avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dossier = Dossier::with('pieceDossier', 'observations', 'parcelle.lotissement.localite','parcelle')->findOrFail($id);

        $avis = Avis::cases();

        return view('agent.hygiene.show', compact('dossier', 'avis'));
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
