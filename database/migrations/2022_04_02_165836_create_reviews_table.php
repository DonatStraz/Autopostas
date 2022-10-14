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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('make_id');
            $table->foreignId('model_id');
            $table->foreignId('generation_id');
            $table->string('title');
            $table->integer('reliability');
            $table->integer('engines');
            $table->integer('interior');
            $table->integer('chassis');
            $table->integer('comfort');
            $table->integer('handling');
            $table->integer('practicality');
            $table->integer('power_economy');
            $table->integer('consumption_city');
            $table->integer('consumption_country');
            $table->integer('consumption_mixed');
            $table->integer('engine_displacement');
            $table->string('body_type');
            $table->string('fuel_type');
            $table->string('gearbox_type');
            $table->string('positives');
            $table->string('negatives');
            $table->string('recommend');
            $table->string('suggestion');
            $table->mediumTEXT('body');
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
        Schema::dropIfExists('reviews');
    }
};
