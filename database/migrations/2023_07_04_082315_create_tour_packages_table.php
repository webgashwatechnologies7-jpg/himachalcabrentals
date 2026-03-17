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
        Schema::create('tour_packages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->foreignId('tour_category_id')->constrained('tour_categories')->cascadeOnUpdate()->cascadeOnDelete();
            $table->text('description')->nullable(true);
            $table->integer('nights')->default(0);
            $table->integer('days')->default(0);
            $table->integer('discount')->default(0);
            $table->double('base_price', 8, 2)->default(0);
            $table->enum('price_type', ['Per Person', 'Per Couple', 'Fixed'])->default('Fixed');
            $table->enum('tour_type',['Group','Regular','Fixed'])->default('Regular');
            $table->integer('group_size')->default(0);
            $table->text('best_time')->nullable(true);
            $table->text('places_covered')->nullable(true);
            $table->longText('itinerary');
            $table->longText('inclusions')->nullable(true);
            $table->longText('exclusions')->nullable(true);
            $table->longText('google_maps')->nullable(true);
            $table->boolean('is_active')->default(0);
            $table->text('image')->nullable(true);
            $table->longText('gallery')->nullable(true);
            $table->string('seo_title')->nullable(true);
            $table->text('meta_description')->nullable(true);
            $table->text('meta_keywords')->nullable(true);
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
        Schema::dropIfExists('tour_packages');
    }
};
