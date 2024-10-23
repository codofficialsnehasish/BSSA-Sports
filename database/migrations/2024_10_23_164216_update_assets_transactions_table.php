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
        Schema::table('assets', function (Blueprint $table) {
            // Step 1: Rename the column
            $table->renameColumn('title', 'assets_category_id');
        });
        
        Schema::table('assets', function (Blueprint $table) {
            // Step 2: Make sure the column has the correct data type and add the foreign key
            $table->unsignedBigInteger('assets_category_id')->change();
            $table->foreign('assets_category_id')->references('id')->on('assets_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('assets', function (Blueprint $table) {
            $table->dropForeign(['assets_category_id']);
        });

        // Step 2: Rename the column back to 'expenses_name'
        Schema::table('assets', function (Blueprint $table) {
            $table->renameColumn('assets_category_id', 'title');
        });
    }
};
