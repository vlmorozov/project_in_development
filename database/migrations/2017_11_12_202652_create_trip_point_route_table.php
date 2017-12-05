<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTripPointRouteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trip_point_route', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->float('lat_from', 9, 6)->default(0.000000)->comment('Широта из');
			$table->float('lng_from', 9, 6)->default(0.000000)->comment('Долгота из');
			$table->float('lat_to', 9, 6)->default(0.000000)->comment('Широта куда');
			$table->float('lng_to', 9, 6)->default(0.000000)->comment('Долгота куда');
			$table->integer('distance')->default(0)->comment('Расстояние, м');
			$table->integer('duration')->default(0)->comment('Продолжительность, с');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('trip_point_route');
	}

}
