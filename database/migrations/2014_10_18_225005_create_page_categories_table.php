<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePageCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
            Schema::create('page_categories', function(Blueprint $table) {
                $table->increments('id');
                $table->integer('position')->nullable();
                $table->unsignedInteger('user_id')->nullable();
                $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
                $table->unsignedInteger('user_id_edited')->nullable();
                $table->foreign('user_id_edited')->references('id')->on('users')->onDelete('set null');
                $table->string('title');
                $table->string('slug');

                $table->timestamps();
                $table->softDeletes();
            });
            
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('page_categories');
    }

}
