<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToVehicleRepairTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('vehicle_repair', function(Blueprint $table)
		{
			$table->foreign('driver_id', 'FK_vehicle_repair_driver_id')->references('id')->on('driver')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('trip_id', 'FK_vehicle_repair_trip_id')->references('id')->on('trip')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('vehicle_id', 'FK_vehicle_repair_vehicle_id')->references('id')->on('vehicle')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('vehicle_repair', function(Blueprint $table)
		{
			$table->dropForeign('FK_vehicle_repair_driver_id');
			$table->dropForeign('FK_vehicle_repair_trip_id');
			$table->dropForeign('FK_vehicle_repair_vehicle_id');
		});
	}

}
