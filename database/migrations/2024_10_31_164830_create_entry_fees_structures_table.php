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
        Schema::create('entry_fees_structures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tournaments_id');
            $table->string('name')->nullable();
            $table->decimal('amount',10,2)->default(0.00);
            $table->timestamps();

            $table->foreign('tournaments_id')->references('id')->on('tournaments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entry_fees_structures');
    }
};
