<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTireSensorDataTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('tire_sensor_data', function(Blueprint $table)
		{
			$table->foreign('trailer_id', 'FK_tire_sensor_data_trailer_id')->references('id')->on('trailer')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('vehicle_id', 'FK_tire_sensor_data_vehicle_id')->references('id')->on('vehicle')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('tire_sensor_data', function(Blueprint $table)
		{
			$table->dropForeign('FK_tire_sensor_data_trailer_id');
			$table->dropForeign('FK_tire_sensor_data_vehicle_id');
		});
	}

}
