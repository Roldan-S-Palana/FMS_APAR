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
        Schema::table('ar_invoice_customer_names', function (Blueprint $table) {
            $table->foreign(['po_number'], 'ar_invoice_customer_names_ibfk_1')->references(['id'])->on('ar_invoice_details')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['customer_id'], 'client_id')->references(['id'])->on('clients')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ar_invoice_customer_names', function (Blueprint $table) {
            $table->dropForeign('ar_invoice_customer_names_ibfk_1');
            $table->dropForeign('client_id');
        });
    }
};
