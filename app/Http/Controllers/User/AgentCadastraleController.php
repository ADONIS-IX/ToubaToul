<?php

namespace App\Http\Controllers\User;

use App\Enums\TypeDossier;
use App\Http\Controllers\Controller;
use App\Models\Dossier;
use App\Models\User;
use Illuminate\Http\Request;

class AgentCadastraleController extends Controller
{

    public function index()
    {

        $dossiers = Dossier::whereIn('type', [TypeDossier::Bail, TypeDossier::Extrait_plan_cadastrale])
        ->oldest()
        ->paginate(10);

        $dossiers->load('user');

        $totalDossiers = Dossier::whereIn('type', [TypeDossier::Bail, TypeDossier::Extrait_plan_cadastrale])->count();
        $totalBails = Dossier::whereIn('type', [TypeDossier::Bail])->count();
        $totalExtraits = Dossier::whereIn('type', [TypeDossier::Extrait_plan_cadastrale])->count();

        return view('agent.cadastrale.index', [
            'dossiers' => $dossiers,
            'totalDossiers' => $totalDossiers,
            'totalBails' => $totalBails,
            'totalExtraits' =>$totalExtraits,
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
