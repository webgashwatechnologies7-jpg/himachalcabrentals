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
        Schema::create('cabs', function (Blueprint $table) {
            $table->id();
            $table->enum('cab_type', ['Small', 'Hatch Back', 'Medium', 'Sedan', 'MPV', 'SUV', 'Van'])->default('Small');
            $table->string('title');
            $table->string('slug');
            $table->integer('seats');
            $table->enum('fuel_type', ['Petrol', 'Diesel', 'Petrol/Diesel'])->default('Petrol/Diesel');
            $table->enum('ac_type',['Non AC','AC'])->default('Non AC');
            $table->integer('rent_per_km')->default(0);
            $table->integer('rent_per_day')->default(0);
            $table->integer('rent_prt_day_for_km')->default(0);
            $table->integer('driver_day_allowance')->default(0);
            $table->integer('driver_night_allowance')->default(0);
            $table->string('image')->nullable(true);
            $table->string('image_alt_title')->nullable(true);
            $table->boolean('is_active')->default(0);
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
        Schema::dropIfExists('cabs');
    }
};
