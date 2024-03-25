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
        Schema::create('ap_fees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('invoice_id')->index('invoice_id');
            $table->unsignedBigInteger('vendor_id')->index('vendor_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('gender');
            $table->string('fee_type');
            $table->string('amount');
            $table->string('update_date');
            $table->string('status');
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
        Schema::dropIfExists('ap_fees');
    }
};
