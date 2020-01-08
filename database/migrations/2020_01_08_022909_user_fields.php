<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('avatar', 255)->nullable();
            $table->string('firstname', 255)->nullable();
            $table->string('lastname', 255)->nullable();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['name']);
        });

        Schema::create('user_devices', function (Blueprint $table) {
            $table->bigIncrements('user_device_id');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->string('device_id', 64)->nullable();
            $table->integer('device_type')->default('5');
            $table->string('device_model')->nullable();
            $table->string('version', 255)->nullable();
            $table->string('os_version', 255)->nullable();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('user_devices');
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['avatar', 'firstname', 'lastname']);
        });
    }
}
