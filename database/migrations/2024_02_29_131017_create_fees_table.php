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
        //Schema::create('fgms_g7_fees', function (Blueprint $table) {

            Schema::create('fees', function (Blueprint $table) {
            $table->id();
            $table->string('avatar');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('gender');
            $table->string('fee_type');
            $table->string('amount');
            $table->string('paid_date');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //Schema::dropIfExists('fgms_g7_fees');
       Schema::dropIfExists('fees');
    }
};
