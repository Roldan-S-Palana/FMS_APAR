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
        //Schema::create('fgms_g7_vendors', function (Blueprint $table) {

        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('full_name')->nullable();
            $table->string('company_name')->nullable();
            $table->string('gender')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('region')->nullable();
            $table->string('contract_start')->nullable();
            $table->string('contract_due')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('payment_term')->nullable();
            $table->string('signature')->nullable();
            $table->string('bir_2302')->nullable();
            $table->string('sec_dti_reg')->nullable();
            $table->string('business_perm')->nullable();
            $table->string('accred_docu')->nullable();
            $table->string('other_docu')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //Schema::dropIfExists('fgms_g7_vendors');

        Schema::dropIfExists('vendors');
    }
};
