<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTireSensorDataTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tire_sensor_data', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('vehicle_id')->nullable()->comment('ID ТС');
			$table->integer('trailer_id')->nullable()->comment('ID прицепа');
			$table->string('location')->nullable()->comment('Месторасположение');
			$table->dateTime('create_datetime')->comment('Дата и время создания записи');
			$table->dateTime('measure_datetime')->comment('Дата и время измерения');
			$table->float('pressure', 10, 0)->nullable()->comment('Давление (KPA)');
			$table->float('temperature', 10, 0)->nullable()->comment('Темпаратура (°C)');
			$table->unique(['vehicle_id','trailer_id','location','measure_datetime'], 'UK_tire_sensor_data');
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
		Schema::drop('tire_sensor_data');
	}

}
