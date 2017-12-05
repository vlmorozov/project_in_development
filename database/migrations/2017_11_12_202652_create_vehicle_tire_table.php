<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVehicleTireTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vehicle_tire', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('vehicle_id')->nullable()->index('FK_vehicle_tire_vehicle_id')->comment('ID ТС');
			$table->integer('trailer_id')->nullable()->index('FK_vehicle_tire_trailer_id')->comment('ID прицепа');
			$table->integer('tire_model_id')->nullable()->index('FK_vehicle_tire_tire_model_id')->comment('ID модели шины');
			$table->string('tire_serial_number')->nullable()->unique('UK_vehicle_tire_tire_serial_number')->comment('Серийный номер шины');
			$table->string('location')->comment('Месторасположение');
			$table->integer('location_n')->nullable()->comment('URL для загрузки данных');
			$table->string('note')->nullable()->comment('Комментарий');
			$table->date('install_date')->nullable()->comment('Дата установки');
			$table->date('uninstall_date')->nullable()->comment('Дата снятия');
			$table->float('pressure', 10, 0)->nullable()->comment('Давление (KPA) - последнее значение');
			$table->float('temperature', 10, 0)->nullable()->comment('Темпаратура (°C) - последнее значение');
			$table->integer('sensor_position')->nullable()->comment('Позиция датчика давления');
			$table->dateTime('measure_datetime')->nullable()->comment('Дата и время последнего измерения');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vehicle_tire');
	}

}
