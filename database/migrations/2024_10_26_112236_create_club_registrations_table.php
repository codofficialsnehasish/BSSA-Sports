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
        Schema::create('club_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('club_name')->nullable();
            $table->string('club_address')->nullable();
            $table->string('contact_no')->nullable();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->timestamps();

            $table->foreign('district_id')->references('id')->on('districts')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('club_registrations');
    }
};
