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
        Schema::create('package_queries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('package_id')->constrained('tour_packages')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('cabs')->nullable(true);
            $table->string('location')->nullable(true);
            $table->string('start_date')->nullable(true);
            $table->string('end_date')->nullable(true);
            $table->string('adults')->nullable(true);
            $table->string('kids')->nullable(true);
            $table->string('pick_up')->nullable(true);
            $table->string('drop')->nullable(true);
            $table->string('description')->nullable(true);
            $table->string('name')->nullable(true);
            $table->string('phone')->nullable(true);
            $table->string('email')->nullable(true);
            $table->string('status')->default('OPEN');
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
        Schema::dropIfExists('package_queries');
    }
};
