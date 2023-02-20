<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->firstName(),
            'email' => fake()->unique()->safeEmail(),
            'password' => '$2y$10$E5bwqBYHscMdQGWbwE8W8OFiO/HjjRENjA/VnUJiU0kkDP/omDRn2', // password
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
