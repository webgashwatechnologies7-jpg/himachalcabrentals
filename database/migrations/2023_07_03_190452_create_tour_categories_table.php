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
        Schema::create('tour_categories', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->text('description')->nullable(true);
            $table->string('seo_title')->nullable(true);
            $table->text('meta_description')->nullable(true);
            $table->text('meta_keywords')->nullable(true);
            $table->string('image')->nullable(true);
            $table->string('image_alt_title')->nullable(true);
            $table->string('alt_title')->nullable(true);
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
        Schema::dropIfExists('tour_categories');
    }
};
