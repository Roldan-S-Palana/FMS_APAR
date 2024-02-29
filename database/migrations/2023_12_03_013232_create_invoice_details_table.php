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
        //Schema::create('fgms_g7_invoice_details', function (Blueprint $table) {

        Schema::create('fgms_g7_invoice_details', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_id')->nullable();
            $table->string('items')->nullable();
            $table->string('category')->nullable();
            $table->string('quantity')->nullable();
            $table->string('price')->nullable();
            $table->string('amount')->nullable();
            $table->string('discount')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //Schema::dropIfExists('fgms_g7_invoice_details');

        Schema::dropIfExists('fgms_g7_invoice_details');
    }
};
