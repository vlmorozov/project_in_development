<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVehicleTireHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vehicle_tire_history', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('create_user_id')->nullable()->index('FK_vehicle_tire_history_create_user_id')->comment('ID пользователя, который создал');
			$table->dateTime('create_datetime')->comment('Дата и время создания');
			$table->integer('vehicle_id')->nullable()->index('FK_vehicle_tire_history_vehicle_id')->comment('ID ТС');
			$table->integer('trailer_id')->nullable()->index('FK_vehicle_tire_history_trailer_id')->comment('ID прицепа');
			$table->integer('tire_model_id')->nullable()->index('FK_vehicle_tire_history_tire_model_id')->comment('ID модели шины');
			$table->string('tire_serial_number')->nullable()->comment('Серийный номер шины');
			$table->string('location')->comment('Месторасположение');
			$table->string('note')->nullable()->comment('Комментарий');
			$table->date('install_date')->nullable()->comment('Дата установки');
			$table->date('uninstall_date')->nullable()->comment('Дата снятия');
			$table->string('url_data')->nullable()->comment('URL для загрузки данных');
			$table->float('pressure', 10, 0)->nullable()->comment('Давление (KPA) - последнее значение');
			$table->float('temperature', 10, 0)->nullable()->comment('Темпаратура (°C) - последнее значение');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vehicle_tire_history');
	}

}
