<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWineTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wine_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('wine_type');
            /*            $table->unsignedInteger('wine_id')->nullable();
            $table->foreign('wine_id')->references('id')->on('wine')->onDelete('set null');
            */
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
        Schema::drop('wine_types');
    }
}
