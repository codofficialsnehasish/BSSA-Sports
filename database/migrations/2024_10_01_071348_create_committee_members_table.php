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
        Schema::create('committee_members', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('committee_id');
            $table->unsignedBigInteger('member_id');
            $table->unsignedBigInteger('designation_id')->nullable();
            $table->timestamps();
    
            // Foreign key constraints
            $table->foreign('committee_id')->references('id')->on('comities')->onDelete('cascade');
            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
            $table->foreign('designation_id')->references('id')->on('designations')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('committee_members');
    }
};
