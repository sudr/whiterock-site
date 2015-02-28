<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('photo', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('location');
			$table->dateTime('created');
			$table->text('latitude');
			$table->text('longitude');
			$table->text('description');
			$table->tinyInteger('public');
			$table->tinyInteger('push_to_facebook');
			$table->dateTime('removed');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('photo');
	}

}
