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
        Schema::table('students', function (Blueprint $table) {
            //
            $table->enum('sex', ['Male','Female','Others'])->after('age');
            $table->unsignedBigInteger('subdivision_id')->after('district_id')->nullable();
            $table->foreign('subdivision_id')->references('id')->on('subdivisions')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            //
            $table->dropColumn(['sex','subdivision_id']);
        });
    }
};
