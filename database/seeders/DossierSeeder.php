<?php

namespace Database\Seeders;

use App\Models\Dossier;
use App\Models\Parcelle;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DossierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $parcelles = Parcelle::all();

        Dossier::factory(180)
        ->sequence(fn () => [
            'parcelle_id' => $parcelles->random(),
            'user_id' => $users->random(),
        ])
        ->hasObservations(5, fn () => ['agent_id' => $users->random()])
        ->create()
        ->each(function ($dossier) use ($users) {
            $dossierusers = $users->random(rand(1, 3))->pluck('id');
            $dossier->users()->attach($dossierusers);
        });;
    }
}
