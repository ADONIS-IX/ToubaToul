<?php

namespace Database\Seeders;

use App\Models\DroitPropriete;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DroitProprieteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $droitProprietes = collect([
            'Attribution',
            'Bail',
            'Titre Foncier',
        ]);

        $droitProprietes -> each(fn ($droitPropriete) => DroitPropriete::create([
            'type' => $droitPropriete,
            'slug' => Str::slug($droitPropriete),
        ]));
    }
}
