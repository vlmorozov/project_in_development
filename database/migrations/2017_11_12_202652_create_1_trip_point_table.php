<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Create1TripPointTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('1_trip_point', function(Blueprint $table)
		{
			$table->integer('trip_point_id')->primary();
			$table->integer('trip_id')->nullable()->index('IDX__trip_point_trip_id');
			$table->float('n', 10, 0)->nullable();
			$table->float('pos', 10, 0)->nullable();
			$table->float('rate', 10, 0)->nullable();
			$table->float('k', 10, 0)->nullable();
			$table->float('tariff_0', 10, 0)->nullable();
			$table->float('tariff_1', 10, 0)->nullable();
			$table->float('tariff_limit', 10, 0)->nullable();
			$table->float('tariff_result', 10, 0)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('1_trip_point');
	}

}
