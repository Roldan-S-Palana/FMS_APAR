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
        Schema::table('ar_invoice_additional_charges', function (Blueprint $table) {
            $table->foreign(['invoice_id'], 'ar_invoice_additional_charges_ibfk_1')->references(['id'])->on('ar_invoice_customer_names')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ar_invoice_additional_charges', function (Blueprint $table) {
            $table->dropForeign('ar_invoice_additional_charges_ibfk_1');
        });
    }
};
