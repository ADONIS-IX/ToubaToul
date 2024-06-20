<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

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
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'profession' => fake()->jobTitle,
            'genre' => fake()->randomElement($array = array ('Homme','Femme')),
            'adresse' => fake()->address,
            'numero_cni' => fake()->unique()->randomNumber(8),
            'telephone' => fake()->phoneNumber,
            'date_naissance' => fake()->dateTimeBetween('-80 years', '-18 years'),
            'lieu_naissance' => fake()->city,
            'remember_token' => Str::random(10),
            'created_at' => $created_at,
            'updated_at'=> $created_at,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
