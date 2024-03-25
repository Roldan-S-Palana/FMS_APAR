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
        //Schema::create('fgms_g7_purchase_order_line', function (Blueprint $table) {

        Schema::create('purchase_order_line', function (Blueprint $table) {
            $table->id();
            $table->string('po_id');
            $table->string('product_id');
            $table->string('quantity');
            $table->string('unit_price');
            $table->string('total_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //Schema::dropIfExists('fgms_g7_purchase_order_line');

        Schema::dropIfExists('purchase_order_line');
        
    }
};
