<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVehicleKmTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vehicle_km', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->dateTime('create_datetime')->comment('Дата и время измерения');
			$table->integer('create_user_id')->nullable()->index('FK_vehicle_km_user_id')->comment('ID пользователя, который измерил');
			$table->integer('vehicle_id')->index('FK_vehicle_km_vehicle_id')->comment('ID ТС');
			$table->integer('km')->comment('Пробег (км)');
			$table->integer('trip_point_id')->nullable()->index('FK_vehicle_km_trip_point_id')->comment('ID точки рейса, в которой было измерение');
			$table->text('note', 65535)->nullable()->comment('Комментарий');
			$table->integer('foto_file_id')->nullable()->index('FK_vehicle_km_foro_file_id')->comment('ID файла фотографии');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vehicle_km');
	}

}
