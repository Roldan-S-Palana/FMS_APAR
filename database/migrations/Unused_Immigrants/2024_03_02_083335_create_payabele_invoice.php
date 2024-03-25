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
        //Schema::create('fgms_g7_payabele_invoice', function (Blueprint $table) {

        Schema::create('payabele_invoice', function (Blueprint $table) {
            $table->id();
            $table->string('vendor_id');
            $table->string('po_id');
            $table->string('date_created');
            $table->string('date_due');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //Schema::dropIfExists('fgms_g7_payabele_invoice');

        Schema::dropIfExists('payabele_invoice');
    }
};
