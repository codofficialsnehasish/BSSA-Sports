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
        Schema::create('salary_configurations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->decimal('base_salary',10,2)->default(0.00);
            $table->decimal('provident_fund',10,2)->default(0.00);
            $table->decimal('health_insurance',10,2)->default(0.00);
            $table->decimal('income_tax',10,2)->default(0.00);
            $table->decimal('other_deductions',10,2)->default(0.00);
            $table->decimal('paying_in_hand',10,2)->default(0.00);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salary_configurations');
    }
};
