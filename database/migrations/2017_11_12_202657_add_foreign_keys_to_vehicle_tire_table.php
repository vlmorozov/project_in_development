<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToVehicleTireTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('vehicle_tire', function(Blueprint $table)
		{
			$table->foreign('tire_model_id', 'FK_vehicle_tire_tire_model_id')->references('id')->on('tire_model')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('trailer_id', 'FK_vehicle_tire_trailer_id')->references('id')->on('trailer')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('vehicle_id', 'FK_vehicle_tire_vehicle_id')->references('id')->on('vehicle')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('vehicle_tire', function(Blueprint $table)
		{
			$table->dropForeign('FK_vehicle_tire_tire_model_id');
			$table->dropForeign('FK_vehicle_tire_trailer_id');
			$table->dropForeign('FK_vehicle_tire_vehicle_id');
		});
	}

}
