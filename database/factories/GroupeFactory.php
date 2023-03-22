<?php

namespace Database\Factories;

use App\Models\Filiere;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Groupe>
 */
class GroupeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {


        return [
            'intitule' => $this->faker->randomElement(['DEV1', 'DEV2', 'DEV3', 'DEV4', 'DEV5']),
            // 'intitule' => $this->faker->random(),
            'filiere_id' => Filiere::all()->random()->id
        ];
    }
}
