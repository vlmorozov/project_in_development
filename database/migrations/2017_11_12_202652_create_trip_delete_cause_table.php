<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTripDeleteCauseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trip_delete_cause', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('title')->comment('Наименование');
			$table->enum('status', array('1','2'))->default('1')->comment('1 - активен, 2 - неактивен');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('trip_delete_cause');
	}

}
