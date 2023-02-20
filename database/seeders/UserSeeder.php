<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Saad',
            'email' => 'saad@example.com',
        ]);

        User::factory()->create([
            'name' => 'Youness',
            'email' => 'youness@example.com',
        ]);

        User::factory()->create([
            'name' => 'Lotfi',
            'email' => 'lotfi@example.com',
        ]);

        User::factory(10)->create();
    }
}
