<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToVehicleModelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('vehicle_model', function(Blueprint $table)
		{
			$table->foreign('fuel_id', 'FK_vehicle_model_fuel_id')->references('id')->on('fuel')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('vehicle_type_id', 'FK_vehicle_model_vehicle_type_id')->references('id')->on('vehicle_type')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('vehicle_model', function(Blueprint $table)
		{
			$table->dropForeign('FK_vehicle_model_fuel_id');
			$table->dropForeign('FK_vehicle_model_vehicle_type_id');
		});
	}

}
