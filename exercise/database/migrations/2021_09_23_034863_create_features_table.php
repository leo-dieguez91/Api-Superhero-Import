<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('features', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('superhero_id');
            $table->integer('strength')->nullable();
            $table->integer('speed')->nullable();
            $table->integer('durability')->nullable();
            $table->integer('power')->nullable();
            $table->integer('combat')->nullable();
            $table->integer('height_in')->nullable();
            $table->integer('height_cm')->nullable();
            $table->integer('weight_lb')->nullable();
            $table->integer('weight_kg')->nullable();
            $table->string('eye_color')->nullable();
            $table->string('hair_color')->nullable();
            $table->unsignedBigInteger('race_id')->nullable();
            $table->foreign('race_id')->references('id')->on('races');
            $table->foreign('superhero_id')->references('id')->on('superheros');
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
        Schema::dropIfExists('features');
    }
}
