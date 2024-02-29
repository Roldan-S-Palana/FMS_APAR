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
        //Schema::create('fgms_g7_payment_term', function (Blueprint $table) {

        Schema::create('fgms_g7_payment_term', function (Blueprint $table) {
            $table->id('payment_term_id');
            $table->string('payment_term')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //Schema::dropIfExists('fgms_g7_payment_term');

        Schema::dropIfExists('fgms_g7_payment_term');
    }
};
