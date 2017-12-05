<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTripStateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trip_state', function(Blueprint $table)
		{
			$table->string('name')->primary();
			$table->string('title');
			$table->string('icon')->nullable();
			$table->integer('sort');
			$table->enum('status', array('1','2'))->default('1');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('trip_state');
	}

}
