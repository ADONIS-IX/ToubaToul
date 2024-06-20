<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Localite>
 */
class LocaliteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => fake()->unique()->city,
            'population' => fake()->numberBetween(2500,7000),
            'superficie' => fake()->randomFloat(2, 2000, 3500),
        ];
    }
}
