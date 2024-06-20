<?php

namespace App\Http\Controllers\User;

use App\Enums\EtatDossier;
use App\Enums\TypeDossier;
use App\Http\Controllers\Controller;
use App\Models\Dossier;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DepositaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('depositaire.index', [
            'dossiers' => auth()->user()->userDossiers
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
    public function show($id)
    {
        $dossier = Dossier::findOrFail($id);
        $dossier->load('pieceDossier', 'observations');

        if ($dossier->user_id != auth()->id()) {
            abort(403, 'Vous n\'avez pas la permission de voir ce dossier.');
        }

        return view('depositaire.show', compact('dossier'));
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
