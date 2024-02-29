<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Schema::create('fgms_g7_vendors', function (Blueprint $table) {

        Schema::create('fgms_g7_vendors', function (Blueprint $table) {
            $table->id();
            $table->string('full_name')->nullable();
            $table->string('company_name')->nullable();
            $table->string('gender')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('region')->nullable();
            $table->string('experience')->nullable();
            $table->string('contract_start')->nullable();
            $table->string('contract_due')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('payment_term')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('fgms_g7_teachers');

        Schema::dropIfExists('fgms_g7_teachers');
    }
};
