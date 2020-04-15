<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOwnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owners', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('FirstName')->nullable();
            $table->string('MiddleInit')->nullable();
            $table->string('LastName')->nullable();
            $table->string('Address1')->nullable();
            $table->string('Address2')->nullable();
            $table->string('City')->nullable();
            $table->integer('StateKey')->nullable();
            $table->integer('RegionKey')->nullable();
            $table->integer('MarketKey')->nullable();
            $table->string('PhoneNumer')->nullable();
            $table->string('MobileNumber')->nullable();
            $table->string('FaxNumber')->nullable();
            $table->string('Email')->nullable();
            $table->string('StartDate')->nullable();
            $table->integer('UserStatusKey')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('owners');
    }
}
