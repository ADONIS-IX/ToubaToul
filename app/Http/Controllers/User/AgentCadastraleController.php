<?php

namespace App\Http\Controllers\User;

use App\Enums\EtatDossier;
use App\Enums\Role;
use App\Enums\TypeDossier;
use App\Http\Controllers\Controller;
use App\Models\Dossier;
use App\Models\DroitPropriete;
use App\Models\Lotissement;
use App\Models\Parcelle;
use App\Models\StatutParcelle;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class AgentCadastraleController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->input('search');

    $query = Dossier::with(['user'])
        ->whereIn('type', [TypeDossier::Bail, TypeDossier::Extrait_plan_cadastrale]);

    if ($search) {
        $query->where(function($q) use ($search) {
            $q->where('id', 'like', "%{$search}%")
              ->orWhere('type', 'like', "%{$search}%")
              ->orWhereHas('user', function ($userQuery) use ($search) {
                  $userQuery->where('prenom', 'like', "%{$search}%")
                            ->orWhere('nom', 'like', "%{$search}%");
              });
        });
    }

    $dossiers = $query->oldest()->paginate(10);

        $totalDossiers = Dossier::whereIn('type', [TypeDossier::Bail, TypeDossier::Extrait_plan_cadastrale])->count();
        $totalBails = Dossier::where('type', [TypeDossier::Bail])->count();
        $totalExtraits = Dossier::where('type', [TypeDossier::Extrait_plan_cadastrale])->count();

        return view('agent.cadastrale.index', [
            'dossiers' => $dossiers,
            'totalDossiers' => $totalDossiers,
            'totalBails' => $totalBails,
            'totalExtraits' =>$totalExtraits,
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
        $dossier = Dossier::with('pieceDossier', 'parcelle', 'parcelle.lotissement.localite.chefLocalites', 'parcelle.droitProprietes')->findOrFail($id);
        $parcelle = Parcelle::all();

        return view('agent.cadastrale.show', compact('dossier'));
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

        return view('agent.cadastrale.dossier', compact('dossier', 'lotissements', 'status', 'etats', 'droitsPropriete', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dossier = Dossier::findOrFail($id);

        // Définition des règles de validation
        $rules = [
            'statut' => ['required', Rule::in(array_column(EtatDossier::cases(), 'value'))],
        ];

        // Ajout des règles conditionnelles en fonction du type de dossier et du statut
        if ($request->statut === EtatDossier::Approuve->value) {
            if ($dossier->type === 'Extrait plan cadastrale') {
                $rules['extrait_plan'] = 'required|file|mimes:pdf,jpg,png|max:2048';
            } elseif ($dossier->type === 'Bail') {
                $rules['titre_bail'] = 'required|file|mimes:pdf,jpg,png|max:2048';
            }
        } elseif ($request->statut === EtatDossier::En_attente->value || $request->statut === EtatDossier::Refuse->value) {
            $rules['extrait_plan'] = 'prohibited';
            $rules['titre_bail'] = 'prohibited';
        }

        // Messages d'erreur personnalisés
        $messages = [
            'extrait_plan.required' => 'Le fichier extrait de plan est requis lorsque le statut est approuvé et le type de dossier est "Extrait plan cadastrale".',
            'titre_bail.required' => 'Le fichier titre de bail est requis lorsque le statut est approuvé et le type de dossier est "Bail".',
            'extrait_plan.prohibited' => 'Vous ne pouvez pas uploader un fichier extrait de plan lorsque le statut est en attente ou refusé.',
            'titre_bail.prohibited' => 'Vous ne pouvez pas uploader un fichier titre de bail lorsque le statut est en attente ou refusé.',
        ];

        // Validation de la requête
        $request->validate($rules, $messages);


        $dossier->statut = $request->statut;

        if ($request->statut === EtatDossier::Approuve->value) {

            if ($request->hasFile('extrait_plan')) {
                $path = $request->file('extrait_plan')->store('dossiers/' . $dossier->id . '/extrait_plan', 'public');
                $dossier->pieceDossier()->create([
                    'nom' => $path,
                    'user_id' => auth()->id(),
                    'is_admin' => true,
                ]);
            }

            if ($request->hasFile('titre_bail')) {
                $path = $request->file('titre_bail')->store('dossiers/' . $dossier->id . '/titre_bail', 'public');
                $dossier->pieceDossier()->create([
                    'nom' => $path,
                    'user_id' => auth()->id(),
                    'is_admin' => true,
                ]);

                // Rechercher le DroitPropriete de type Bail
                $droitBail = DroitPropriete::where('type', 'Bail')
                ->orWhere('slug', 'bail')
                ->first();

                // Synchroniser la parcelle avec le droit de propriété Bail
                $dossier->parcelle->droitProprietes()->syncWithoutDetaching([$droitBail->id]);
            }
        }

        $dossier->save();

         // Associer l'agent au dossier
        $dossier->users()->syncWithoutDetaching([auth()->id()]);

        return redirect()->route('cadastrale.show', $dossier->id)->withStatus('Dossier mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
