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
        Schema::create('ar_invoice_total_amounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('invoice_id')->nullable()->index('invoice_id');
            $table->decimal('taxable_amount', 10)->nullable();
            $table->string('round_off')->nullable();
            $table->decimal('total_amount', 10)->nullable();
            $table->string('upload_sign')->nullable();
            $table->string('name_of_the_signatuaory')->nullable();
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
        Schema::dropIfExists('ar_invoice_total_amounts');
    }
};
