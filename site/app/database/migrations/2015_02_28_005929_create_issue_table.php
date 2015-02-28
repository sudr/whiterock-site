<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIssueTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('issue', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('name');
			$table->text('email');
			$table->text('phone');
			$table->dateTime('assigned');
			$table->text('location');
			$table->text('type');
			$table->text('status');
			$table->text('priority');
			$table->text('assigned_to');
			$table->text('comment');
			$table->text('description');
			$table->dateTime('resolved')->nullable();
			$table->integer('trail_id');
			$table->integer('photo_id');
			$table->dateTime('date');
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
		Schema::drop('issue');
	}

}
