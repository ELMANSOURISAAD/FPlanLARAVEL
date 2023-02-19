<?php

namespace Database\Seeders;

use App\Models\ElementRecette;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ElementRecetteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ElementRecette::factory(10)->create();
    }
}
