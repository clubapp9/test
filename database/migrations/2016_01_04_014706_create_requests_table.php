<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('requests', function( Blueprint $table ) {
           $table->increments('request_id');
            $table->integer('user_id');
            $table->enum('request_type', [ 'add_to_speakers_bureau', 'add_to_group'] );
            $table->string( 'request_message', 200 );
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
        Schema::drop('requests');
    }
}
