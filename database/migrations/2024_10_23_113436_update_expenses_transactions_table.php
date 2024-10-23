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

        Schema::table('expenses_transactions', function (Blueprint $table) {
            // Step 1: Rename the column
            $table->renameColumn('expenses_name', 'expenses_category_id');
        });
        
        Schema::table('expenses_transactions', function (Blueprint $table) {
            // Step 2: Make sure the column has the correct data type and add the foreign key
            $table->unsignedBigInteger('expenses_category_id')->change();
            $table->foreign('expenses_category_id')->references('id')->on('expense_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Step 1: Drop the foreign key
        Schema::table('expenses_transactions', function (Blueprint $table) {
            $table->dropForeign(['expenses_category_id']);
        });

        // Step 2: Rename the column back to 'expenses_name'
        Schema::table('expenses_transactions', function (Blueprint $table) {
            $table->renameColumn('expenses_category_id', 'expenses_name');
        });
    }
};
