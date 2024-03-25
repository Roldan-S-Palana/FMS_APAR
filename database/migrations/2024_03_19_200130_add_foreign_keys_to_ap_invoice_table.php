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
        Schema::table('ap_invoice', function (Blueprint $table) {
            $table->foreign(['purchase_order_id'], 'pur_ord')->references(['id'])->on('ap_purchase_order')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['vendor_id'], 'vendor_id')->references(['id'])->on('vendors')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ap_invoice', function (Blueprint $table) {
            $table->dropForeign('pur_ord');
            $table->dropForeign('vendor_id');
        });
    }
};
