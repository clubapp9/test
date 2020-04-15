<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wine', function (Blueprint $table) {
            $table->increments('id');

            $table->string('upc');

            $table->string('name');

            $table->unsignedInteger('type_id')->nullable();
            $table->foreign('type_id')->references('id')->on('wine_types')->onDelete('set null');

            /*$table->unsignedInteger('vintage_id')->nullable();
            $table->foreign('vintage_id')->references('id')->on('wine_vintages')->onDelete('set null');*/

            $table->string('vintage');

            $table->decimal('regular_sell_price', 8, 3);

            $table->decimal('cost', 8, 3);

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
    }
}
