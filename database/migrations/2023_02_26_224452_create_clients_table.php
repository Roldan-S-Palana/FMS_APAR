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
        Schema::create('clients', function (Blueprint $table) {

        //Schema::create('fgms_g7_clients', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('gender')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('zip code')->nullable();
            $table->string('city')->nullable();
            $table->string('region')->nullable();
            $table->string('email')->nullable();
            $table->string('admission_id')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('upload')->nullable();
            $table->string('signiture')->nullable();
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
        Schema::dropIfExists('clients');

        //Schema::dropIfExists('fgms_g7_clients');
    }
};
