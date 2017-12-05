<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSensorTireDataTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sensor_tire_data', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('vehicle_id')->nullable()->comment('ID ТС');
			$table->integer('trailer_id')->nullable()->comment('ID прицепа');
			$table->string('vehicle_host')->nullable()->comment('Имя компьютера тс');
			$table->integer('sensor_position')->nullable()->comment('Позиция датчика');
			$table->dateTime('create_datetime')->comment('Дата и время создания записи');
			$table->dateTime('request_datetime')->nullable()->comment('Дата и время отправки запроса');
			$table->dateTime('measure_datetime')->comment('Дата и время измерения');
			$table->float('pressure', 10, 0)->nullable()->comment('Давление (KPA)');
			$table->float('temperature', 10, 0)->nullable()->comment('Темпаратура (°C)');
			$table->string('location')->nullable()->comment('Позиция');
			$table->unique(['vehicle_id','trailer_id','measure_datetime'], 'UK_tire_sensor_data');
			$table->index(['trailer_id','measure_datetime'], 'IDX_tire_sensor_data_trailer_id');
			$table->index(['vehicle_id','measure_datetime'], 'IDX_tire_sensor_data_vehicle_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sensor_tire_data');
	}

}
