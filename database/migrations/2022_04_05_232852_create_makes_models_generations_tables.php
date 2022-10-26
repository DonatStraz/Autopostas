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
        Schema::create('car_makes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('car_models', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('make_id');
            $table->timestamps();
        });
        Schema::create('car_generations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('model_id');
            $table->mediumTEXT('about');
            $table->string('hero_image');
            $table->mediumTEXT('images');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('car_makes');
        Schema::drop('car_models');
        Schema::drop('car_generations');
    }
};
