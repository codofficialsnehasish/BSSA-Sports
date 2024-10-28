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
        Schema::create('club_in_tournamets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tournaments_id');
            $table->unsignedBigInteger('club_registrations_id');
            $table->decimal('paid_amount',10,2)->default(0.00);
            $table->string('payment_mode')->nullable();
            $table->timestamps();

            $table->foreign('tournaments_id')->references('id')->on('tournaments')->onDelete('cascade');
            $table->foreign('club_registrations_id')->references('id')->on('club_registrations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('club_in_tournamets');
    }
};
