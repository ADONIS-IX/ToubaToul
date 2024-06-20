<?php

namespace Database\Factories;

use App\Enums\Avis;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Observation>
 */
class ObservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $created_at = fake()->dateTimeBetween('-1 year');

        return [
            'content' => fake()->sentence,
            'avis' => fake()->randomElement(array_column(Avis::cases(), 'value')),
            'created_at' => $created_at,
            'updated_at' => $created_at,
        ];
    }
}
