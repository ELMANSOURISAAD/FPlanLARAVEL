<?php

namespace Database\Factories;

use App\Models\Inventaire;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Inventaire>
 */
class InventaireFactory extends Factory
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
            'stock' => $this->faker->randomDigit(),
            'user_id' => $this->faker->randomDigit(),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
