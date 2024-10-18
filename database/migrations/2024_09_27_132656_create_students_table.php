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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('application_id')->nullable();
            $table->string('roll_no')->nullable();
            $table->string('full_name');
            $table->string('guardian_name');
            $table->string('email')->nullable();
            $table->bigInteger('mobile_number')->nullable();
            $table->bigInteger('whatsapp_number')->nullable();
            $table->date('dob')->nullable();
            $table->integer('age')->nullable();
            $table->decimal('height', 8, 2)->nullable();
            $table->decimal('weight', 8, 2)->nullable();
            $table->string('school_portal_id')->nullable();
            $table->decimal('uniform_size', 8, 2)->nullable();
            $table->string('residential_address')->nullable();
            $table->string('permanent_address')->nullable();
            $table->unsignedBigInteger('class_id')->nullable();
            $table->unsignedBigInteger('interest_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->bigInteger('aadhar_card_no')->nullable();
            $table->unsignedBigInteger('aadhar_proof')->nullable();
            $table->unsignedBigInteger('profile_image')->nullable();
            $table->decimal('admission_fees', 8, 2)->nullable();
            $table->decimal('monthly_fees', 8, 2)->nullable();
            $table->unsignedBigInteger('fee_category_id')->nullable();
            $table->tinyInteger('status')->nullable()->default(0);
            $table->timestamps();
            $table->foreign('class_id')->references('id')->on('classes')->onDelete('set null');
            $table->foreign('interest_id')->references('id')->on('special_interests')->onDelete('set null');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('set null');
            $table->foreign('aadhar_proof')->references('id')->on('media')->onDelete('set null');
            $table->foreign('profile_image')->references('id')->on('media')->onDelete('set null');
            $table->foreign('fee_category_id')->references('id')->on('fee_categories')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
