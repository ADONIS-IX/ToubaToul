<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Parcelle>
 */
class ParcelleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $created_at = fake()->dateTimeBetween('-1 years');

        return [
            'numeroLot' => fake()->unique()->bothify('Lot-####'),
            'superficie' => fake()->numberBetween(150,300),
            'coordonne_x' => fake()->longitude(),
            'coordonne_y' => fake()->latitude(),
            'created_at' => $created_at,
            'updated_at' => $created_at,
        ];
    }
}
