<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLogTimeIncomingCallTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('log_time_incoming_call', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->dateTime('create_datetime')->nullable();
			$table->string('request')->nullable();
			$table->dateTime('start')->nullable();
			$table->dateTime('finish')->nullable();
			$table->integer('micro')->nullable();
			$table->integer('create_user_id')->nullable();
			$table->integer('t0')->nullable();
			$table->integer('t1')->nullable();
			$table->integer('t2')->nullable();
			$table->integer('success')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('log_time_incoming_call');
	}

}
