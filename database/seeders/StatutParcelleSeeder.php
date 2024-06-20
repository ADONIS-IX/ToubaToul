<?php

namespace Database\Seeders;

use App\Models\StatutParcelle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class StatutParcelleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statutParcelles = collect([
            'Libre',
            'Batie',
        ]);

        $statutParcelles -> each(fn ($statutParcelle) => StatutParcelle::create([
            'titre' => $statutParcelle,
            'slug' => Str::slug($statutParcelle),
        ]));
    }
}
