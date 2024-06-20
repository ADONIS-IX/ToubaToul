<?php

namespace Database\Seeders;

use App\Models\StatutParcelle;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         User::factory(20)->create();

        $this->call([
            LocaliteSeeder::class,
            ChefLocaliteSeeder::class,
            LotissementSeeder::class,
            StatutParcelleSeeder::class,
            DroitProprieteSeeder::class,
            ParcelleSeeder::class,
            DossierSeeder::class,
            PieceDossierSeeder::class,
        ]);
    }
}
