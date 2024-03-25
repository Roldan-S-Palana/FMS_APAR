<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //Schema::create('fgms_g7_pending_invoice_approval', function (Blueprint $table) {

        Schema::create('pending_invoice_approval', function (Blueprint $table) {
            $table->id();
            $table->string('approval_id');
            $table->string('invoice_id');
            $table->string('company_name');
            $table->string('gender');
            $table->string('fee_types');
            $table->string('amount');
            $table->string('approver_id')->nullable();
            $table->string('status');
            $table->text('remarks')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       //Schema::dropIfExists('fgms_g7_pending_invoice_approval');

         Schema::dropIfExists('pending_invoice_approval');
    }
};
