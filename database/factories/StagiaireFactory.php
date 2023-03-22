<?php

namespace Database\Factories;

use App\Models\Groupe;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stagiaire>
 */
class StagiaireFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->lastName(),
            'prenom' => $this->faker->firstName(),
            'dateNaissance' => $this->faker->date(),
            'genre' => $this->faker->randomElement(['male', 'female']),
            'addresse' => $this->faker->address(),
            'tel' => $this->faker->e164PhoneNumber(),
            'groupe_id' => Groupe::all()->random()->id
        ];
    }
}
