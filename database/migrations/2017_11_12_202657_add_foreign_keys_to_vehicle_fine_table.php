<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToVehicleFineTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('vehicle_fine', function(Blueprint $table)
		{
			$table->foreign('driver_id', 'FK_vehicle_fine_driver_id')->references('id')->on('driver')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('driver_payment_id', 'FK_vehicle_fine_driver_payment_id')->references('id')->on('driver_payment')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('vehicle_id', 'FK_vehicle_fine_vehicle_id')->references('id')->on('vehicle')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('vehicle_fine', function(Blueprint $table)
		{
			$table->dropForeign('FK_vehicle_fine_driver_id');
			$table->dropForeign('FK_vehicle_fine_driver_payment_id');
			$table->dropForeign('FK_vehicle_fine_vehicle_id');
		});
	}

}
