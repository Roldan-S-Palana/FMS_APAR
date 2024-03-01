<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateRoleTypeUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_type_users', function (Blueprint $table) {

        //Schema::create('fgms_g7_role_type_users', function (Blueprint $table) {
            $table->id();
            $table->string('role_type')->nullable();
            $table->timestamps();
        });

        DB::table('role_type_users')->insert([

        //DB::table('fgms_g7_role_type_users')->insert([
            ['role_type' => 'Admin'],
            ['role_type' => 'Super Admin'],
            ['role_type' => 'Normal User'],
            ['role_type' => 'Teachers'],
            ['role_type' => 'Student'],
            ['role_type' => 'Staff'],
            ['role_type' => 'Client'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_type_users');

        //Schema::dropIfExists('fgms_g7_role_type_users');
    }
}
