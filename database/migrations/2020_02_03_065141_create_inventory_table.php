<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('inventory', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('inventory_location_id')->nullable();
            $table->foreign('inventory_location_id')->references('id')->on('inventory_location')->onDelete('set null');

            $table->string('quantity');


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
        //
        Schema::drop('inventory');
    }
}
