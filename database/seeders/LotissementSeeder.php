<?php

namespace Database\Seeders;

use App\Models\Localite;
use App\Models\Lotissement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LotissementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $localites = Localite::all();

        Lotissement::factory(6)
        ->sequence(fn () => [
            'localite_id' => $localites->random(),
            ])
        ->create();
    }
}
