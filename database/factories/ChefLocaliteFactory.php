<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ChefLocalite>
 */
class ChefLocaliteFactory extends Factory
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
            'prenom' => fake()->firstName,
            'nom' => fake()->lastName,
            'numero_cni' => fake()->unique()->randomNumber(8),
            'email' => fake()->unique()->safeEmail(),
            'telephone' => fake()->phoneNumber,
            'photo_cni' => fake()->imageUrl,
            'created_at' => $created_at,
            'updated_at' => $created_at,
        ];
    }
}
