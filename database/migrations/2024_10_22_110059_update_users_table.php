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
        Schema::table('users', function (Blueprint $table) {
            $table->tinyInteger('status')->default(0)->after('id');

            $table->string('phone')->unique()->nullable()->after('email_verified_at');
            $table->string('alternate_contact_number')->after('phone')->nullable();

            $table->text('address')->nullable()->after('remember_token');
            $table->string('pin_code')->nullable()->after('address');
            $table->unsignedBigInteger('profile_image')->nullable()->after('pin_code');
            $table->string('aadhaar_number')->nullable()->after('profile_image');
            $table->unsignedBigInteger('aadhaar_image')->nullable()->after('aadhaar_number');
            $table->string('pan_card_number')->after('aadhaar_image')->nullable();
            $table->unsignedBigInteger('pan_card_proof')->after('pan_card_number')->nullable();

            $table->enum('gender',['Male', 'Female'])->after('pan_card_proof')->nullable();
            $table->date('date_of_birth')->after('gender')->nullable();
            $table->string('blood_group')->after('date_of_birth')->nullable();
            $table->string('nationality')->after('blood_group')->nullable();
            $table->string('religion')->after('nationality')->nullable();
            $table->string('marital_status')->after('religion')->nullable();

            $table->string('bank_ac_number')->after('marital_status')->nullable();
            $table->string('bank_name')->after('bank_ac_number')->nullable();
            $table->string('ifsc_code')->after('bank_name')->nullable();
            $table->unsignedBigInteger('passbook_image')->after('ifsc_code')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'pan_card_number',
                'pan_card_proof',
                'alternate_contact_number',
                'gender',
                'date_of_birth',
                'blood_group',
                'nationality',
                'religion',
                'marital_status',
                'present_country',
                'present_state',
                'present_city',
                'present_pin_code',
                'present_address',
                'permanent_country',
                'permanent_state',
                'permanent_city',
                'permanent_pin_code',
                'permanent_address',
                'bank_ac_number',
                'bank_name',
                'ifsc_code',
                'passbook_image'
            ]);
        });
    }
};
