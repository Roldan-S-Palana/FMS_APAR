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
        //Schema::create('fgms_g7_invoice_approval', function (Blueprint $table) {

        Schema::create('invoice_approval', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_id');
            $table->string('approver_id');
            $table->string('status')->default('pending');
            $table->timestamps();

            ;
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //Schema::dropIfExists('fgms_g7_invoice_approval');

        Schema::dropIfExists('invoice_approval');
    }
};
