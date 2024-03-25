<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApFeesTable extends Migration
{
    public function up()
    {
        Schema::create('ap_fees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('invoice_id');
            $table->unsignedBigInteger('vendor_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('gender');
            $table->string('fee_type');
            $table->string('amount');
            $table->string('update_date');
            $table->string('status');
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('invoice_id')->references('id')->on('ap_invoice')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('vendor_id')->references('id')->on('ap_vendor')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ap_fees');
    }
}
