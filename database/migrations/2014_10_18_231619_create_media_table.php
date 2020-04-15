<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('media', function (Blueprint $table) {
			//$table->engine = 'InnoDB';
			$table->increments('id')->unsigned();
			$table->integer('position')->nullable();
			$table->string('filename', 255);
			$table->string('name', 255)->nullable();
			$table->text('description')->nullable();
			$table->unsignedInteger('media_folder_id')->nullable();
			$table->foreign('media_folder_id')->references('id')->on('media_folder')->onDelete('set null');
			$table->unsignedInteger('user_id')->nullable();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
			$table->unsignedInteger('user_id_edited')->nullable();
			$table->foreign('user_id_edited')->references('id')->on('users')->onDelete('set null');
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
		Schema::drop('media');
	}

}
