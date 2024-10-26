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
        Schema::create('student_payment_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('students_id')->nullable();
            $table->decimal('amount',10,2)->default(0.00);
            $table->text('remarks')->nullable();
            $table->timestamps();

            $table->foreign('students_id')->references('id')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_payment_orders');
    }
};
