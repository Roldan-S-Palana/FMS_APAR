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
        //Schema::create('fgms_g7_invoice_discounts', function (Blueprint $table) {

        Schema::create('fgms_g7_invoice_discounts', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_id')->nullable();
            $table->string('offer_new')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //Schema::dropIfExists('fgms_g7_invoice_discounts');

        Schema::dropIfExists('fgms_g7_invoice_discounts');
    }
};
