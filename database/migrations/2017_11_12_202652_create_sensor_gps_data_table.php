<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSensorGpsDataTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sensor_gps_data', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('vehicle_id')->comment('ID ТС');
			$table->string('vehicle_host')->nullable()->comment('Имя компьютера тс');
			$table->dateTime('create_datetime')->nullable()->comment('Дата и время создания записи');
			$table->dateTime('request_datetime')->nullable()->comment('Дата и время отправки запроса');
			$table->dateTime('measure_datetime')->nullable()->comment('Дата и время измерения');
			$table->float('lat', 10, 0)->nullable();
			$table->float('lng', 10, 0)->nullable();
			$table->index(['vehicle_id','measure_datetime'], 'IDX_sensor_gps_data');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sensor_gps_data');
	}

}
