<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVehicleDriverTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vehicle_driver', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('vehicle_id')->comment('ID тс');
			$table->integer('driver_id')->index('FK_vehicle_driver_driver_id')->comment('ID водителя');
			$table->enum('status', array('1','2'))->nullable()->comment('1-активен, 2-неактиване');
			$table->unique(['vehicle_id','driver_id'], 'UK_vehicle_driver');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vehicle_driver');
	}

}
