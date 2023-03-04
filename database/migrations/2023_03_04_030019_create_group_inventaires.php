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
        Schema::create('group_inventaires', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('group_id');
            $table->integer('inventaire_id');
            $table->integer('pourcentage');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('group_inventaires');
    }
};
