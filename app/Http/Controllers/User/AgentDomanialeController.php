<?php

namespace App\Http\Controllers\User;

use App\Enums\Avis;
use App\Enums\EtatDossier;
use App\Enums\Role;
use App\Enums\TypeDossier;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateDomanialeDossierRequest;
use App\Models\Dossier;
use App\Models\DroitPropriete;
use App\Models\Lotissement;
use App\Models\Parcelle;
use App\Models\PieceDossier;
use App\Models\StatutParcelle;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AgentDomanialeController extends Controller
{

    public function index(Request $request): View
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
    public function show(string $id): View
    {
        $dossier = Dossier::with('pieceDossier', 'parcelle')->findOrFail($id);

        return view('agent.domaniale.show', compact('dossier'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $dossier = Dossier::with('pieceDossier')->findOrFail($id);
        $lotissements = Lotissement::all();
        $status = StatutParcelle::all();
        $etats = EtatDossier::cases();
        $droitsPropriete = DroitPropriete::all();
        $roles = Role::cases();

        return view('agent.domaniale.dossier', compact('dossier', 'lotissements', 'status', 'etats', 'droitsPropriete', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDomanialeDossierRequest $request, string $id)
    {
        $validated = $request->validated();

        $dossier = Dossier::findOrFail($id);

         // Gérer le fichier du plan de lotissement
    if ($request->hasFile('plan_lotissement')) {
        $path = $request->file('plan_lotissement')->store('dossiers/' . $dossier->id . '/plans_lotissement', 'public');

        // Créer une nouvelle PieceDossier
        PieceDossier::create([
            'nom' => $path,
            'dossier_id' => $dossier->id,
            'user_id' => auth()->id(),
            'is_admin' => true,
            //'chemin' => 'Plan de Lotissement',
        ]);
    }

    if ($request->hasFile('notification')) {
        $path = $request->file('notification')->store('dossiers/' . $dossier->id . '/notification', 'public');

        // Créer une nouvelle PieceDossier
        PieceDossier::create([
            'nom' => $path,
            'dossier_id' => $dossier->id,
            'user_id' => auth()->id(),
            'is_admin' => true,
            //'chemin' => 'notification d'attribution',
        ]);
    }

    if ($validated['statut'] === EtatDossier::Approuve->value) {
        // Créer la nouvelle parcelle
        $parcelle = Parcelle::create([
            'numeroLot' => $validated['numeroLot'],
            'superficie' => $validated['superficie'],
            'coordonne_x' => $validated['coordonne_x'],
            'coordonne_y' => $validated['coordonne_y'],
            'lotissement_id' => $validated['lotissement_id'],
            'statut_parcelle_id' => $validated['statut_parcelle_id'],
            'proprietaire_id' => $dossier->user_id,
        ]);

        // Associer les droits de propriété à la parcelle
        $parcelle->droitProprietes()->attach($validated['droit_propriete']);

         // Mettre à jour le dossier avec la nouvelle parcelle
        $dossier->update([
            'statut' => $validated['statut'],
            'parcelle_id' => $parcelle->id,
        ]);

        // Vérifier si l'utilisateur est dépositaire et mettre à jour son rôle
        if ($dossier->user->role === Role::Depositaire) {
            $dossier->user->update(['role' => Role::Proprietaire]);
        }

        /*
        // Rechercher le DroitPropriete de type Attribution
        $droitAttribution = DroitPropriete::where('type', 'Attribution')
        ->orWhere('slug', 'attribution')
        ->first();

        // Synchroniser la parcelle avec le droit de propriété Bail
        $dossier->parcelle->droitProprietes()->syncWithoutDetaching([$droitAttribution->id]);
         */

    } else {
        // Mise à jour du statut uniquement si le dossier est refusé
        $dossier->update([
            'statut' => $validated['statut'],
        ]);
    }

    // Associer l'agent au dossier
    $dossier->users()->syncWithoutDetaching([auth()->id()]);

        return redirect()->route('domaniale.index')->withStatus('Dossier mis à jour et parcelle créée avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
