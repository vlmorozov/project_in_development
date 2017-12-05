<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVehicleMovementHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vehicle_movement_history', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('trip_id')->nullable()->index('FK_vehicle_movement_history_trip_id')->comment('ID рейса');
			$table->integer('vehicle_id')->nullable()->index('FK_vehicle_movement_history_vehicle_id')->comment('ID тс');
			$table->integer('parking_id')->nullable()->index('FK_vehicle_movement_history_parking_id')->comment('ID парковки');
			$table->integer('contractor_delivery_id')->nullable()->index('FK_vehicle_movement_history_contractor_delivery_id')->comment('ID точки контрагента');
			$table->dateTime('datetime_in')->nullable()->comment('Дата и время въезда в зону');
			$table->dateTime('datetime_out')->nullable()->comment('Дата и время выезда из зоны');
			$table->enum('status', array('1','2'))->default('1')->comment('1 - активен, 2 - неактивен');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vehicle_movement_history');
	}

}
