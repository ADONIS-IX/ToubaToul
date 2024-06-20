<?php

namespace Database\Seeders;

use App\Models\Dossier;
use App\Models\PieceDossier;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PieceDossierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dossiers = Dossier::all();
        $users = User::all();

        PieceDossier::factory(80)
        ->sequence(fn () => [
            'dossier_id' => $dossiers->random(),
            'user_id' => $users->random(),
        ])
        ->create();
    }
}
