<?php

namespace Database\Factories;

use App\Models\Recette;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Recette>
 */
class RecetteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement(['Couscous','Tagine', 'Tanjia', 'Blanquette de veau', 'Boulgi boulga']),
            'created_at' => now(),
            'updated_at' => now(),
            'user_id' =>  $this->faker->randomDigit(),
        ];
    }
}
