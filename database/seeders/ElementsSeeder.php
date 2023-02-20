<?php

namespace Database\Seeders;

use App\Models\Element;
use Database\Factories\ElementFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ElementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Element::factory(20)->create();
    }
}
