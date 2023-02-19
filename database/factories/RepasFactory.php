<?php

namespace Database\Factories;

use App\Models\Repas;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Repas>
 */
class RepasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'recette_id' => $this->faker->randomDigit(),
            'user_id' => $this->faker->randomDigit(),
            'date_repas' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
