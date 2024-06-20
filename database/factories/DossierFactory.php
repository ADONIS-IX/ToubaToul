<?php

namespace Database\Factories;

use App\Enums\Avis;
use App\Enums\EtatDossier;
use App\Enums\TypeDossier;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dossier>
 */
class DossierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $types = fake()->randomElement(array_column(TypeDossier::cases(), 'value'));
        $created_at = fake()->dateTimeBetween('-1 year');

        return [
            'type' => $types,
            'slug' => Str::slug($types),
            'statut' => fake()->randomElement(array_column(EtatDossier::cases(), 'value')),
            'created_at' => $created_at,
            'updated_at' => $created_at,
        ];
    }
}
