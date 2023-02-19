<?php

namespace Database\Factories;

use App\Models\Element;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Element>
 */
class ElementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            'name' => $this->faker->randomElement(['Semoule','Agneau', 'Beurre', 'Sel', 'Poivre']),
            'unit' => $this->faker->randomElement(['kilogrammes','grammes', 'cas', 'cac']),
            'price' => $this->faker->randomFloat(2, 0, 10),
            'user_id' => $this->faker->randomDigit(),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
