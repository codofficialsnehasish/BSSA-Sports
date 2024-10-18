<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('subdivisions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('district_id')->index();
            $table->string('district_code')->nullable();
            $table->unsignedBigInteger('state_id')->index();
            $table->string('state_code')->nullable();
            $table->unsignedBigInteger('country_id')->index();
            $table->string('country_code')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->boolean('flag')->default(false);
            $table->string('wikiDataId')->nullable();
            $table->tinyInteger('is_visible')->default(1);
            $table->timestamps();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subdivisions');
    }
};
