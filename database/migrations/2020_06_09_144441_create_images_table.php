<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->foreignID('user_ID')->references('id')->on('users');
            $table->foreignID('model_ID')->references('id')->on('models');
            $table->foreignID('airline_ID')->constrained('id')->on('airlines');
            $table->foreignID('airport_ID')->references('id')->on('airports');
            $table->string('image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images');
    }
}
