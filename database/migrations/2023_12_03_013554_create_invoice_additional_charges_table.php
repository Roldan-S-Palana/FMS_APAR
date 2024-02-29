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
        //Schema::create('fgms_g7_invoice_additional_charges', function (Blueprint $table) {

        Schema::create('fgms_g7_invoice_additional_charges', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_id')->nullable();
            $table->string('service_charge')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //Schema::dropIfExists('fgms_g7_invoice_additional_charges');

        Schema::dropIfExists('fgms_g7_invoice_additional_charges');
    }
};