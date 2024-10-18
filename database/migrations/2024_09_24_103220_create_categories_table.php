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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->nullable();
            $table->longText('description')->nullable();
            $table->tinyInteger('is_visible')->nullable()->default(0);
            $table->tinyInteger('is_home')->nullable()->default(0);
            $table->tinyInteger('is_popular')->nullable()->default(0);
            $table->tinyInteger('is_special')->nullable()->default(0);
            $table->unsignedBigInteger('media_id')->nullable();
            $table->timestamps();
            $table->foreign('media_id')->references('id')->on('media')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
