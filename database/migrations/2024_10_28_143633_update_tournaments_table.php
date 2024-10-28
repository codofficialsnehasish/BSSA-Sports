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
        Schema::table('tournaments', function (Blueprint $table) {
            $table->unsignedBigInteger('tournament_category_id')->nullable()->after('tournament_name');
            $table->foreign('tournament_category_id')->references('id')->on('tournament_categories')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tournaments', function (Blueprint $table) {
            $table->dropForeign(['tournament_category_id']);
            $table->dropColumn('tournament_category_id'); 
        });
    }
};
