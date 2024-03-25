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
        Schema::create('vendors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('full_name')->nullable();
            $table->string('company_name')->nullable();
            $table->string('gender')->nullable();
            $table->integer('contact_no')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->bigInteger('zip_code')->nullable();
            $table->string('region')->nullable();
            $table->date('contract_start')->nullable();
            $table->date('contract_due')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('payment_term')->nullable();
            $table->string('signature')->nullable();
            $table->string('bir_2302')->nullable();
            $table->string('sec_dti_reg')->nullable();
            $table->string('business_perm')->nullable();
            $table->string('accred_docu')->nullable();
            $table->string('other_docu')->nullable();
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
        Schema::dropIfExists('vendors');
    }
};
