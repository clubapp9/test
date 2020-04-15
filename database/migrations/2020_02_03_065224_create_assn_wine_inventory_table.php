<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssnWineInventoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('assn_wine_inventory', function (Blueprint $table) {
            $table->unsignedInteger('wine_id')->nullable();
            $table->foreign('wine_id')->references('id')->on('wine')->onDelete('set null');

            $table->unsignedInteger('inventory_id')->nullable();
            $table->foreign('inventory_id')->references('id')->on('inventory')->onDelete('set null');
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
        Schema::drop('assn_wine_inventory');
    }
}
