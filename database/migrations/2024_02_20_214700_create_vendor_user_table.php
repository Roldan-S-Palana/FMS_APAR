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
        Schema::create('vendor_user', function (Blueprint $table) {
            $table->id();
            $table->string('vendorname');
            $table->string('name');
            $table->string('avatar');
            $table->string('email');
            $table->string('phone');
            $table->string('postalcode');
            $table->string('category');
            $table->string('role_name');
            $table->string('contract_start_date');
            $table->string('contract_due_date');
            $table->string('payment_method');
            $table->string('payment_term');
            $table->string('digisign');
            $table->string('bir');
            $table->string('bussper');
            $table->string('dirreg');
            $table->string('accdocu');
            $table->string('othersdoc');
            $table->string('join_date');
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendor_user');
    }
};
