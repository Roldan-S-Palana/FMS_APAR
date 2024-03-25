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
        Schema::create('ap_pending_invoice_approval', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('approval_id')->index('approval_id');
            $table->unsignedBigInteger('invoice_id')->index('invoice_id');
            $table->string('company_name');
            $table->string('gender');
            $table->string('fee_types');
            $table->string('amount');
            $table->unsignedBigInteger('approver_id')->nullable()->index('approver_id');
            $table->string('status');
            $table->text('remarks')->nullable();
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
        Schema::dropIfExists('ap_pending_invoice_approval');
    }
};
