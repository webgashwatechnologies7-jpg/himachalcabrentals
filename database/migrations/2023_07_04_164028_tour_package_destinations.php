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
        Schema::create('tour_package_destinations', function (Blueprint $table) {
            $table->foreignId('tour_package_id')->constrained('tour_packages')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('destination_id')->constrained('destinations')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tour_package_destinations');
    }
};
