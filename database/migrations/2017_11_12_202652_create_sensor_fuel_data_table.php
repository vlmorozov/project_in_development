<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSensorFuelDataTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sensor_fuel_data', function(Blueprint $table)
		{
			$table->integer('id', true)->comment('ID');
			$table->dateTime('datetime_data')->index('sensor_fuel_datetime_data')->comment('Время полученых данных');
			$table->decimal('volume', 6)->comment('Наполненость бака в литрах');
			$table->enum('status', array('1','2'))->nullable();
			$table->integer('vehicle_id')->comment('ID ТС');
			$table->unique(['vehicle_id','datetime_data'], 'UK_sensor_fuel_data');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sensor_fuel_data');
	}

}
