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
        Schema::table('student_transactions', function (Blueprint $table) {
            $table->unsignedBigInteger('student_payment_orders_id')->after('id');

            $table->foreign('student_payment_orders_id')->references('id')->on('student_payment_orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('student_transactions', function (Blueprint $table) {
            $table->dropForeign(['student_payment_orders_id']);
            $table->dropColumn('student_payment_orders_id'); 
        });
    }
};
