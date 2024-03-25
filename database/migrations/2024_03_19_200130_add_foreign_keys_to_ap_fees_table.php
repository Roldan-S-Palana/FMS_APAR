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
        Schema::table('ap_fees', function (Blueprint $table) {
            $table->foreign(['invoice_id'], 'invoice_id')->references(['id'])->on('ap_invoice')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ap_fees', function (Blueprint $table) {
            $table->dropForeign('invoice_id');
        });
    }
};
