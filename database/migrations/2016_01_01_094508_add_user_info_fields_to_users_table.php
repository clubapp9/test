<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserInfoFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string( 'first_name', 100 )->nullable();
            $table->string( 'last_name', 100 )->nullable();
            $table->string( 'title' , 100 )->nullable();
            $table->string( 'organization', 100 )->nullable();
            $table->string( 'phone', 20 )->nullable();
            $table->string( 'picture' )->nullable();
            $table->enum( 'speakers_bureau' , [ 'yes', 'no' ] )->nullable();
            $table->text( 'short_bio' )->nullable();
            $table->string( 'area_of_expertise', 100 )->nullable();
        });

        /*Schema::table('users', function ($table) {
            $table->dropColumn('first_name');
        });*/


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
