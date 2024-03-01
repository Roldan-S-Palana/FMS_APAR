<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateUserTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_types', function (Blueprint $table) {

        //Schema::create('fgms_g7_user_types', function (Blueprint $table) {
            $table->id();
            $table->string('type_name')->nullable();
            $table->timestamps();
        });

        DB::table('user_types')->insert([

        //DB::table('fgms_g7_user_types')->insert([
            ['type_name' => 'Active'],
            ['type_name' => 'Inactive'],
            ['type_name' => 'Disable']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_types');

        //Schema::dropIfExists('fgms_g7_user_types');
    }
}
