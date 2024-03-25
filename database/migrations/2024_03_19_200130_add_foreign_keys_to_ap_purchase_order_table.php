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
        Schema::table('ap_purchase_order', function (Blueprint $table) {
            $table->foreign(['staff_id'], 'staff_id')->references(['id'])->on('staff')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ap_purchase_order', function (Blueprint $table) {
            $table->dropForeign('staff_id');
        });
    }
};
