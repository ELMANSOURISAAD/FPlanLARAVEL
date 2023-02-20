<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        ini_set('memory_limit', '-1');
        DB::unprepared(file_get_contents( __dir__ . "/dumps/structure.sql"));

        //Seeders
        $this->call([
            UserSeeder::class,
            ElementsSeeder::class,
            InventaireSeeder::class,
            ElementRecetteSeeder::class,
            RepasSeeder::class,
            RecettesSeeder::class
        ]);
    }
}
