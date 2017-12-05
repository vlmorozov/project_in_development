<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDeviceBatteryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('device_battery', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('user_id')->comment('ID пользователя');
			$table->string('device_id')->index('IDX_device_battery_device_id')->comment('Идентификатор устройства');
			$table->boolean('battery')->comment('Уровень заряда батареи');
			$table->boolean('is_charge')->default(0)->comment('Устройство заряжается');
			$table->dateTime('device_datetime')->comment('Время устройства');
			$table->dateTime('server_datetime')->index('IDX_device_battery_server_datetime')->comment('Время сервера');
			$table->index(['user_id','server_datetime'], 'IDX_device_battery');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('device_battery');
	}

}
