<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToVehicleFuelingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('vehicle_fueling', function(Blueprint $table)
		{
			$table->foreign('reason_deviation_id', 'FK_vehicle_fueling_reason_deviation_id')->references('id')->on('reason_deviation_vehicle_fueling')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('trip_id', 'FK_vehicle_fueling_trip_id')->references('id')->on('trip')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('vehicle_id', 'FK_vehicle_fueling_vehicle_id')->references('id')->on('vehicle')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('vehicle_fueling', function(Blueprint $table)
		{
			$table->dropForeign('FK_vehicle_fueling_reason_deviation_id');
			$table->dropForeign('FK_vehicle_fueling_trip_id');
			$table->dropForeign('FK_vehicle_fueling_vehicle_id');
		});
	}

}
