<?php

namespace Database\Seeders;

use App\Models\ChefLocalite;
use App\Models\Localite;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChefLocaliteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $localites = Localite::all();

        ChefLocalite::factory(10)
        ->sequence(fn () => [
            'localite_id' => $localites->random(),
        ])
        ->create();
    }
}
