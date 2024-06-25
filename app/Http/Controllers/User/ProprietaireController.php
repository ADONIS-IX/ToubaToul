<?php

namespace App\Http\Controllers\User;

use App\Enums\EtatDossier;
use App\Enums\TypeDossier;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDossierRequest;
use App\Models\Dossier;
use App\Models\Parcelle;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Support\Str;

class ProprietaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $user = auth()->user();
        $search = $request->input('search');
        $status = $request->input('status');

        $dossiers = $user->userDossiers()
            ->with('parcelle.lotissement.localite') // Chargement eager optimisé
            ->when($search, function (Builder $query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('id', 'like', "%{$search}%")
                    ->orWhere('type', 'like', "%{$search}%")
                    ->orWhereHas('parcelle', function ($q) use ($search) {
                        $q->where('numeroLot', 'like', "%{$search}%")
                            ->orWhereHas('lotissement.localite', function ($q) use ($search) {
                                $q->where('nom', 'like', "%{$search}%");
                        });
                    });
                });
            })
            ->when($status, function (Builder $query) use ($status) {
                $query->where('statut', $status);
            });

        $dossierCounts = $user->userDossiers()
            ->selectRaw('statut, COUNT(*) as count')
            ->groupBy('statut')
            ->pluck('count', 'statut')
            ->toArray();

            $dossierCounts = array_combine(
                array_map(fn($key) => EtatDossier::from($key)->value, array_keys($dossierCounts)),
                $dossierCounts);

        return view('proprietaire.index', [
            'dossiers' => $dossiers->paginate(10),
            'search' => $request->input('search'),
            'currentStatus' => $status,
            'dossierCounts' => $dossierCounts,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $types = TypeDossier::cases();
        $parcelles = auth()->user()->parcelles;

        return view('proprietaire.dossier', compact('types', 'parcelles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDossierRequest $request)
    {
        $validatedData = $request->validated();

        $dossier = new Dossier();
        $dossier->type = $validatedData['type'];
        $dossier->user_id = auth()->id();
        $dossier->slug = Str::slug($validatedData['type'] . '-' . time());

        if ($validatedData['type'] !== TypeDossier::Terrain->value) {
            $parcelle = Parcelle::findOrFail($validatedData['parcelle_id']);

            // Vérifier si l'utilisateur est propriétaire
            if ($parcelle->proprietaire_id !== auth()->id()) {
                abort(403, 'Vous n\'avez pas la permission de créer un dossier pour cette parcelle.');
            }

            $dossier->parcelle_id = $parcelle->id;
        }

        $dossier->save();

        foreach ($validatedData as $key => $file) {
            if ($request->hasFile($key)) {
                $path = $request->file($key)->store('dossiers/' . $dossier->id, 'public');
                $dossier->pieceDossier()->create([
                    'nom' => $path,
                    //'chemin' => $key,
                    'user_id' => auth()->id(),
                    'is_admin' => false, // ou true si l'admin l'ajoute
                ]);
            }
        }

        return redirect()->route('proprietaire.index')->withStatus('Dossier créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $dossier = Dossier::with('pieceDossier', 'observations', 'parcelle.lotissement.localite','parcelle')->findOrFail($id);

        if ($dossier->user_id != auth()->id()) {
            abort(403, 'Vous n\'avez pas la permission de voir ce dossier.');
        }

        return view('proprietaire.show', compact('dossier'));
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
    public function destroy($id)
    {
        $dossier = Dossier::findOrFail($id);

        if ($dossier->user_id != auth()->id()) {
            abort(403, 'Vous n\'avez pas la permission de supprimer ce dossier.');
        }

        // Supprimer tous les fichiers associés
        foreach ($dossier->pieceDossier as $piece) {
            Storage::disk('public')->delete($piece->nom);
        }

        // Supprimer le dossier physique dans le repertoire
        Storage::disk('public')->deleteDirectory('dossiers/' . $dossier->id, 'public');

        $dossier->delete();

        return redirect()->route('proprietaire.index')->withStatus('Dossier supprimé avec succès.');
    }
}
