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
        Schema::create('sheets', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('strength');
            $table->unsignedTinyInteger('dexterity');
            $table->unsignedTinyInteger('constitution');
            $table->unsignedTinyInteger('wisdom');
            $table->unsignedTinyInteger('charisma');
            $table->foreignId('sheet_id')->constrained(); //Create a field and reference for our Character table finds it
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sheets');
    }
};
