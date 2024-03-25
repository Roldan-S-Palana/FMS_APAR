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
        Schema::create('ap_purchase_order_line', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('po_id')->index('po_id');
            $table->unsignedBigInteger('product_id')->index('product_id');
            $table->integer('quantity');
            $table->decimal('unit_price', 10);
            $table->decimal('total_price', 10);
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
        Schema::dropIfExists('ap_purchase_order_line');
    }
};
