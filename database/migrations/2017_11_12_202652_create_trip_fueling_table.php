<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTripFuelingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trip_fueling', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('trip_id')->nullable()->index('FK_trip_fueling_trip_id')->comment('Рейса, в котором была заправка');
			$table->decimal('amount', 8, 3)->comment('Объем топлива (л)');
			$table->string('note')->nullable()->comment('Комментарий');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('trip_fueling');
	}

}
