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
        Schema::create('players_in_tournaments_clubs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('club_registrations_id');
            $table->unsignedBigInteger('tournaments_id');
            $table->string('player_name')->nullable();
            $table->string('father_name')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('whatsapp_number')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('age')->nullable();
            $table->string('aadhar_number')->nullable();
            $table->text('address')->nullable();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->unsignedBigInteger('profile_image')->nullable();
            $table->timestamps();

            $table->foreign('tournaments_id')->references('id')->on('tournaments')->onDelete('cascade');
            $table->foreign('club_registrations_id')->references('id')->on('club_registrations')->onDelete('cascade');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('set null');
            $table->foreign('profile_image')->references('id')->on('media')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players_in_tournaments_clubs');
    }
};
