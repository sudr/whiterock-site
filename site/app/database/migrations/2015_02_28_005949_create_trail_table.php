<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trail', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('name');
			$table->text('type');
			$table->text('condition');
			$table->text('difficulty');
			$table->integer('length');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('trail');
	}

}
