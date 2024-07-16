<?php

namespace Database\Seeders;

use App\Models\DroitPropriete;
use App\Models\Lotissement;
use App\Models\Parcelle;
use App\Models\StatutParcelle;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParcelleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuts = StatutParcelle::all();
        $lotissements = Lotissement::all();
        $users = User::all();

        Parcelle::factory(100)
        ->sequence(fn () => [
            'statut_parcelle_id' => $statuts->random(),
            'lotissement_id' => $lotissements->random(),
            'proprietaire_id' => $users->random(),
            ])
        ->create()
        ->each(function ($parcelle) use ($users) {
            // Associer des gestionnaires à la parcelle (entre 1 et 3 gestionnaires au hasard)
            $managers = $users->random(rand(1, 3))->pluck('id');
            $parcelle->managedUsers()->attach($managers);
            //droit de propriete
            $droitProprietes = DroitPropriete::all()->random(rand(1, 3));
            $parcelle->droitProprietes()->attach($droitProprietes);
        });
    }
}
