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
        Schema::table('ap_purchase_order_line', function (Blueprint $table) {
            $table->foreign(['po_id'], 'po_id')->references(['id'])->on('ap_purchase_order')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ap_purchase_order_line', function (Blueprint $table) {
            $table->dropForeign('po_id');
        });
    }
};
