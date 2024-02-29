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
        //Schema::create('fgms_g7_fee_status', function (Blueprint $table) {

        Schema::create('fee_status', function (Blueprint $table) {
            $table->id();
            $table->string('fee_status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //Schema::dropIfExists('fgms_g7_fee_status');

        Schema::dropIfExists('fee_status');
    }
};
