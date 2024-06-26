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
        //Schema::create('fgms_g7_departments', function (Blueprint $table) {

        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('department_id')->nullable();
            $table->string('department_name')->nullable();
            $table->string('head_of_department')->nullable();
            $table->string('department_start_date')->nullable();
            $table->string('no_of_employee')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departments');

        //Schema::dropIfExists('fgms_g7_departments');
    }
};
