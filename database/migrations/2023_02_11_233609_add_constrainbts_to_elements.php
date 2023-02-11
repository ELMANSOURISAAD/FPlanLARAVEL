<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('element_recette', function(Blueprint $table) {
            $table->foreign('recette_id')->references('id')->on('recettes')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });
        Schema::table('element_recette', function(Blueprint $table) {
            $table->foreign('element_id')->references('id')->on('elements')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
};
