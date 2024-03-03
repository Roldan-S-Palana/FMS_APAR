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
        //Schema::create('fgms_g7_purchase_order', function (Blueprint $table) {

        Schema::create('purchase_order', function (Blueprint $table) {
            $table->id();
            $table->string('vendor_id');
            $table->string('staff_id');
            $table->string('date_order');
            $table->string('total_amount');
            $table->string('ship_date');
            $table->string('ship_address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
//        Schema::dropIfExists('fgms_g7_purchase_order');

        Schema::dropIfExists('purchase_order');
    }
};
