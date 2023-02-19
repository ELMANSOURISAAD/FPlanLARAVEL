<?php

namespace Database\Factories;

use App\Models\ElementRecette;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ElementRecette>
 */
class ElementRecetteFactory extends Factory
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
            'element_id' => $this->faker->randomDigit(),
            'created_at' => now(),
            'updated_at' => now(),
            'quantity' => $this->faker->randomFloat(2, 0, 10),
        ];
    }
}
