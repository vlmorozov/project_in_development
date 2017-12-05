<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDeviceLocationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('device_location', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('user_id')->nullable()->index('FK_device_location_user_id')->comment('ID пользователя');
			$table->string('device_id');
			$table->float('lat', 9, 6)->comment('широта');
			$table->float('lng', 9, 6)->comment('долгота');
			$table->float('accuracy', 3, 1)->nullable()->comment('точность (в метрах)');
			$table->enum('provider', array('0','1','2'))->nullable()->comment('источник данных (0 - fused, 1 - gps, 2 - network)');
			$table->dateTime('device_time')->nullable()->comment('время');
			$table->boolean('speed')->nullable()->comment('скорость');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('device_location');
	}

}
