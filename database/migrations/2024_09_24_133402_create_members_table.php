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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('father_name')->nullable();
            $table->string('email')->nullable();
            $table->bigInteger('mobile_number')->nullable();
            $table->bigInteger('whatsapp_number')->nullable();
            $table->date('dob')->nullable();
            $table->integer('age')->nullable();
            $table->string('address')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->bigInteger('aadhar_card_no')->nullable();
            $table->unsignedBigInteger('aadhar_proof')->nullable();
            $table->unsignedBigInteger('profile_image')->nullable();
            $table->tinyInteger('status')->nullable()->default(0);
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('set null');
            $table->foreign('aadhar_proof')->references('id')->on('media')->onDelete('set null');
            $table->foreign('profile_image')->references('id')->on('media')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
