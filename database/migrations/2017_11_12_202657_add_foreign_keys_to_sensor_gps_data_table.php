<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSensorGpsDataTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('sensor_gps_data', function(Blueprint $table)
		{
			$table->foreign('vehicle_id', 'FK_sensor_gps_data_vehicle_id')->references('id')->on('vehicle')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('sensor_gps_data', function(Blueprint $table)
		{
			$table->dropForeign('FK_sensor_gps_data_vehicle_id');
		});
	}

}
