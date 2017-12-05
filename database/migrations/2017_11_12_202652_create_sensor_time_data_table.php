<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSensorTimeDataTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sensor_time_data', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('vehicle_id')->nullable()->comment('ID ТС');
			$table->string('vehicle_host')->nullable()->comment('Имя компьютера тс');
			$table->dateTime('create_datetime')->nullable()->comment('Дата и время записи');
			$table->dateTime('request_datetime')->nullable()->comment('Дата и время отправки запроса');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sensor_time_data');
	}

}
