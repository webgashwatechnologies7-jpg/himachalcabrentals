<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable(false);
            $table->string('title')->nullable(true);
            $table->string('headLine')->nullable(true);
            $table->string('tagLine')->nullable(true);
            $table->string('buttonText')->nullable(true);
            $table->string('buttonLink')->nullable(true);
            $table->integer('order')->nullable(false);
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
        Schema::dropIfExists('sliders');
    }
};
