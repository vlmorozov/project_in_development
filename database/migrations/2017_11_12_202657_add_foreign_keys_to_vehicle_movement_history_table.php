<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToVehicleMovementHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('vehicle_movement_history', function(Blueprint $table)
		{
			$table->foreign('contractor_delivery_id', 'FK_vehicle_movement_history_contractor_delivery_id')->references('id')->on('contractor_delivery')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('parking_id', 'FK_vehicle_movement_history_parking_id')->references('id')->on('parking')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('trip_id', 'FK_vehicle_movement_history_trip_id')->references('id')->on('trip')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('vehicle_id', 'FK_vehicle_movement_history_vehicle_id')->references('id')->on('vehicle')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('vehicle_movement_history', function(Blueprint $table)
		{
			$table->dropForeign('FK_vehicle_movement_history_contractor_delivery_id');
			$table->dropForeign('FK_vehicle_movement_history_parking_id');
			$table->dropForeign('FK_vehicle_movement_history_trip_id');
			$table->dropForeign('FK_vehicle_movement_history_vehicle_id');
		});
	}

}
