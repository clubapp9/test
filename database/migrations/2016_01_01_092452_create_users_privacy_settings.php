<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersPrivacySettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_privacy_settings', function (Blueprint $table) {
            $table->increments('privacy_settings_id');
            $table->enum('setting', [ 'share-all', 'share-group', 'private' ]);
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
        Schema::drop('users_privacy_settings');
    }
}
