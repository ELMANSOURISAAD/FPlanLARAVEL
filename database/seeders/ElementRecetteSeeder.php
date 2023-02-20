<?php

namespace Database\Seeders;

use App\Models\ElementRecette;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ElementRecetteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //  Schema::rename('element_recettes','element_recette');

       ElementRecette::factory(10)->create();
    }
}
