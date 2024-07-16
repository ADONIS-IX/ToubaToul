<?php

namespace App\Http\Controllers;

use App\Enums\Avis;
use App\Enums\EtatDossier;
use App\Enums\Role;
use App\Enums\TypeDossier;
use App\Models\Dossier;
use App\Models\Observation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CadastraleInstructionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $status = $request->query('status', 'en_attente');
        $search = $request->query('search');

        $query = Dossier::with(['user', 'parcelle', 'parcelle.lotissement.localite'])
            ->where('type', TypeDossier::Construction);

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('id', 'like', "%{$search}%")
                  ->orWhereHas('user', function($q) use ($search) {
                      $q->where('nom', 'like', "%{$search}%")
                        ->orWhere('prenom', 'like', "%{$search}%");
                  })
                  ->orWhereHas('parcelle', function ($q) use ($search) {
                    $q->where('numeroLot', 'like', "%{$search}%")
                        ->orWhereHas('lotissement.localite', function ($q) use ($search) {
                            $q->where('nom', 'like', "%{$search}%");
                    });
                });
            });
        }

        switch ($status) {
            case 'en_attente':
                $query->where('statut', EtatDossier::En_attente)
                    ->whereDoesntHave('observations.user', function ($q) {
                        $q->where('role', Role::Agent_Cadastrale);
                    });
                break;
            case 'favorable':
                $query->whereIn('statut', EtatDossier::cases())
                    ->whereHas('observations', function ($q) {
                        $q->whereHas('user', function ($sq) {
                            $sq->where('role', Role::Agent_Cadastrale);
                        })->where('avis', Avis::Favorable);
                    });
                break;
            case 'rejete':
                $query->whereIn('statut', EtatDossier::cases())
                    ->whereHas('observations', function ($q) {
                        $q->whereHas('user', function ($sq) {
                            $sq->where('role', Role::Agent_Cadastrale);
                        })->where('avis', Avis::Reserve);
                    });
                break;
            case 'all':
                $query->whereIn('statut', EtatDossier::cases())
                    ->whereHas('observations.user', function ($q) {
                        $q->where('role', Role::Agent_Cadastrale);
                    });
                break;
        }

        $dossiers = $query->oldest()->paginate(10);

        $totalDossiers = Dossier::where('type', TypeDossier::Construction)
            ->whereIn('statut', EtatDossier::cases())
            ->whereHas('observations.user', function ($query) {
                $query->where('role', Role::Agent_Cadastrale);
            })->count();

        $totalApprouve = Dossier::where('type', TypeDossier::Construction)
            ->whereIn('statut', EtatDossier::cases())
            ->whereHas('observations', function ($query) {
                $query->whereHas('user', function ($q) {
                    $q->where('role', Role::Agent_Cadastrale);
                })->where('avis', Avis::Favorable);
            })->count();

        $totalRefuse = Dossier::where('type', TypeDossier::Construction)
            ->whereIn('statut', EtatDossier::cases())
            ->whereHas('observations', function ($query) {
                $query->whereHas('user', function ($q) {
                    $q->where('role', Role::Agent_Cadastrale);
                })->where('avis', Avis::Reserve);
            })->count();

        $totalAttente = Dossier::where('type', TypeDossier::Construction)
            ->where('statut', EtatDossier::En_attente)
            ->whereDoesntHave('observations.user', function ($query) {
                $query->where('role', Role::Agent_Cadastrale);
            })->count();

        return view('agent.cadastrale.instruction.index', compact('dossiers', 'totalDossiers', 'totalApprouve', 'totalRefuse', 'totalAttente', 'status'));
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

        // Définir les messages de validation personnalisés
        $messages = [
            'avis.required' => 'Ce champ est requis',
            'avis.in' => 'Le champ avis doit être une valeur valide.',
            'observation.required_if' => 'Ce champ est requis quand avis est "Reserve".',
            'observation.max' => 'L\'observation ne peut pas dépasser 255 caractères.',
        ];

        // Valider les données du formulaire
        $validatedData = $request->validate([
            'avis' => 'required|in:' . implode(',', array_column(Avis::cases(), 'value')),
            'observation' => 'required_if:avis,Reserve|nullable|string|max:255',
            ], $messages);

            $dossier = Dossier::findOrFail($id);

            $observation = new Observation();
            $observation->avis = $validatedData['avis'];
            $observation->content = $validatedData['observation'] ?? null;
            $observation->dossier_id = $dossier->id;
            $observation->agent_id = Auth::id();
            $observation->save();

            return redirect()->route('cadastrale.instruction.show', $dossier->id)
            ->withStatus('Observation soumise avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $dossier = Dossier::with('pieceDossier', 'observations', 'parcelle.lotissement.localite','parcelle')->findOrFail($id);

        $avis = Avis::cases();

        return view('agent.cadastrale.instruction.show', compact('dossier', 'avis'));
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
