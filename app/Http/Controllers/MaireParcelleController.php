<?php

namespace App\Http\Controllers;

use App\Enums\EtatParcelle;
use App\Http\Controllers\Controller;
use App\Models\Dossier;
use App\Models\Parcelle;
use Illuminate\Http\Request;
use Illuminate\View\View;


class MaireParcelleController extends Controller
{
    public function index(Request $request): View
    {
        $status = $request->query('status', EtatParcelle::Batie->value);
        $search = $request->query('search');


        // On ne filtre plus par type de dossier
       $query = Parcelle::with(['user', 'statutParcelle', 'lotissement']);

        if ($status !== 'all') {
            $query->where('statut_parcelle_id', $status);
        }

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('id', 'like', "%{$search}%")
                  ->orWhereHas('user', function($q) use ($search) {
                      $q->where('nom', 'like', "%{$search}%")
                        ->orWhere('prenom', 'like', "%{$search}%");
                  });
            });
        }

        $parcelles = $query->paginate(100);

        // Calcul des totaux pour tous les types de dossiers
        $totalParcelles = Parcelle::count();
        $totalLibre = Parcelle::where('statut_parcelle_id', EtatParcelle::Libre->value)->count();
        $totalBatie = Parcelle::where('statut_parcelle_id', EtatParcelle::Batie->value)->count();

        return view('maire.parcelle', [
            'parcelles' => $parcelles,
            'totalParcelles' => $totalParcelles,
            'totalLibre' => $totalLibre,
            'totalBatie' => $totalBatie,
            'currentStatus' => $status,
            'search' => $search,
        ]);
    }

    public function show(Dossier $dossier): View
    {
        return view('maire.showParcelle', [
            'dossier' => $dossier
        ]);
    }

}
